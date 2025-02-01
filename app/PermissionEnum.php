<?php

namespace App;

enum PermissionEnum: string
{
    case MANAGE_USERS = 'manage_users';
    case MANAGE_SYSTEM_SETTINGS = 'manage_system_settings';

    case VIEW_FINANCIAL_REPORTS = 'view_financial_reports';
    case MANAGE_APPOINTMENTS = 'manage_appointments';

    case SCHEDULE_APPOINTMENTS = 'schedule_appointments';
    case PROCESS_PAYMENTS = 'process_payments';

    case VIEW_OWN_SCHEDULE = 'view_own_schedule';
    case UPDATE_SERVICE_STATUS = 'update_service_status';

    case MANAGE_INVENTORY = 'manage_inventory';

    case MANAGE_PROMOTIONS = 'manage_promotions';
    case SEND_MARKETING_CAMPAIGNS = 'send_marketing_campaigns';

    case MANAGE_PAYROLL = 'manage_payroll';
    case VIEW_FINANCIAL_DATA = 'view_financial_data';

    case BOOK_APPOINTMENTS = 'book_appointments';
    case VIEW_OWN_HISTORY = 'view_own_history';
}
