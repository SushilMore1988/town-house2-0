<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'users-list',
            'users-create',
            'users-show',
            'users-edit',
            'users-delete',
            'user-list',
            'user-verification-list',
            'user-block',
            'cowork-space-owner-list',
            'cowork-space-list',
            'cowork-space-status',
            'cowork-space-add-review',
            'cowork-space-delete',
            'cowork-space-booking-list',
            'cowork-space-booking-availability-list',
            'terms-and-condition-list',
            'terms-and-condition-customized-enquiry-list',
            'terms-and-condition-setting-list',
            'enquiry-list',
            'enquiry-cowork-space-list',
            'enquiry-cowork-space-membership-list',
            'enquiry-cowork-space-tourschedule-list',
            'facility-list',
            'facility-create',
            'facility-edit',
            'facility-delete',
            'price-setting-list',
            'price-setting-create',
            'price-setting-edit',
            'price-setting-delete',
            'algorithm-list',
            'algorithm-edit',
            'about-list',
            'about-blogspot-list',
            'about-blogspot-create',
            'about-team-list',
            'about-team-create',
            'about-story-list',
            'about-story-create',
            'about-terms-list',
            'about-terms-create',
            'develop-list',
            'develop-add-feedback',
            'develop-view-feedback',
            'promo-code-list',
            'promo-code-create',
            'promo-code-edit',
            'promo-code-delete',
            'transaction-list',
            'transaction-cws-listing-payment',
            'transaction-cws-booking-payment',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
