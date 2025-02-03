<?php

namespace App;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case SALON_OWNER = 'salon_owner';
    case RECEPTIONIST = 'receptionist';
    case STYLIST = 'stylist';
    case INVENTORY_MANAGER = 'inventory_manager';
    case MARKETING_MANAGER = 'marketing_manager';
    case ACCOUNTANT = 'accountant';
    case CUSTOMER = 'customer';
    case SERVICE_PROVIDER = 'service_provider';
}
