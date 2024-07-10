<?php

namespace Modules\Order\Enums;

enum OrderStatus: string
{

    //Chờ xác thực
    case AwaitingVerification = 'Awaiting Verification';
    //Chờ xác nhận
    case AwaitingConfirmation = 'Awaiting Confirmation';
    //Đang xử lý
    case Processing = 'Processing';
    //Đang vận chuyển
    case InTransit = 'In Transit';
    //Đã giao
    case Delivered = 'Delivered';
    //Đã hủy
    case Cancelled = 'Cancelled';
    //Bị từ chối
    case Rejected = 'Rejected';

    
    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
