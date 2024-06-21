<?php

namespace App\Services;


use App\Models\Worker;
use DateTime;
class TimeSlotService
{
    public function __construct(Worker $worker)
    {
        $this->worker = $worker;
    }

    public function calculateTimeSlots(int $duration): array
    {
        $worker = $this->worker;
        $schedules = $worker->getActiveSchedule();
        $currentDay = strtolower(now()->englishDayOfWeek);
        $skipTillToday = true;

        $timeSlots = [];

        foreach ($schedules as $dayOfWeek => $schedule) {
            $timeSlots[$dayOfWeek] = [
                'date' => '',
                'slots' => [],
            ];
            if ($skipTillToday && $dayOfWeek !== $currentDay) {
                continue;
            }

            $skipTillToday = false;

            foreach (json_decode($schedule) as $scheduleNode) {
                $startingTime = DateTime::createFromFormat('H', $scheduleNode[0]);

                $slotsOfDay = $this->buildTimeSlots(
                    $duration,
                    ($dayOfWeek === $currentDay && now() > $startingTime) ? now() : $startingTime,
                    DateTime::createFromFormat('H', $scheduleNode[1])
                );

                $timeSlots[$dayOfWeek]['slots'] = array_merge($timeSlots[$dayOfWeek]['slots'], $slotsOfDay);
            }
            $timeSlots[$dayOfWeek]['date'] = now()->toDateString();
        }

        return $timeSlots;
    }

    protected function buildTimeSlots(int $interval, DateTime $start, DateTime $end): array
    {
        $startTime = $start->format('H:i');
        $endTime = $end->format('H:i');
        $timeSlots = [];

        while (strtotime($startTime) <= strtotime($endTime)) {
            $start = $startTime;
            $followingTime = strtotime('+' . $interval . 'minutes', strtotime($startTime));
            $end = date('H:i', $followingTime);
            $startTime = date('H:i', $followingTime);

            if (strtotime($startTime) <= strtotime($endTime)) {

                $timeSlots[] = [
                    'start_time' => $start,
                    'end_time'   => $end,
                ];
            }
        }

        return $timeSlots;
    }
}
