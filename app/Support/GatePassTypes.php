<?php

namespace App\Support;

final class GatepassTypes
{
    public const STUDENT_VEHICLE = 'student_vehicle';
    public const EMPLOYEE_VEHICLE = 'employee_vehicle';
    public const GUARDIAN_DRIVE_THRU = 'guardian_drive_thru';
    public const DELIVERY = 'delivery';
    public const CONCESSIONAIRE = 'concessionaire';
    public const CONTRACTOR = 'contractor';
    public const VIP = 'vip';

    public static function options(): array
    {
        return [
            self::STUDENT_VEHICLE => 'Student Vehicle',
            self::EMPLOYEE_VEHICLE => 'Employee Vehicle',
            self::GUARDIAN_DRIVE_THRU => 'Guardian Drive-Thru',
            self::DELIVERY => 'Delivery',
            self::CONCESSIONAIRE => 'Concessionaire',
            self::CONTRACTOR => 'Contractor',
            self::VIP => 'VIP',
        ];
    }
}
