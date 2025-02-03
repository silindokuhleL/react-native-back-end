<?php

namespace App;

enum PermissionEnum: string
{
    // System Management
    case MANAGE_USERS = 'manage_users';
    case MANAGE_SYSTEM_SETTINGS = 'manage_system_settings';

    // Financial
    case VIEW_FINANCIAL_REPORTS = 'view_financial_reports';
    case VIEW_FINANCIAL_DATA = 'view_financial_data';
    case MANAGE_PAYROLL = 'manage_payroll';
    case PROCESS_PAYMENTS = 'process_payments';

    // Appointments
    case MANAGE_APPOINTMENTS = 'manage_appointments';
    case SCHEDULE_APPOINTMENTS = 'schedule_appointments';
    case BOOK_APPOINTMENTS = 'book_appointments';
    case VIEW_OWN_SCHEDULE = 'view_own_schedule';

    // Services
    case UPDATE_SERVICE_STATUS = 'update_service_status';
    case MANAGE_OWN_SERVICES = 'manage_own_services';

    // Inventory
    case MANAGE_INVENTORY = 'manage_inventory';

    // Marketing
    case MANAGE_PROMOTIONS = 'manage_promotions';
    case SEND_MARKETING_CAMPAIGNS = 'send_marketing_campaigns';

    // User History
    case VIEW_OWN_HISTORY = 'view_own_history';
}
