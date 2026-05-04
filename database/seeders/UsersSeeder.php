<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $receptionDept = \App\Models\Department::where('dep_name', 'Приемная главы Чебоксарского муниципального округа')->first();
        $itDept        = \App\Models\Department::where('dep_name', 'Отдел информатизации')->first();
        $hrDept        = \App\Models\Department::where('dep_name', 'Сектор кадровой работы')->first();
        $legalDept     = \App\Models\Department::where('dep_name', 'Юридический отдел')->first();
        $financeDept   = \App\Models\Department::where('dep_name', 'Управление экономики, сельского хозяйства, имущественных и земельных отношений')->first();

        // Поиск ID должностей
        $adminPos      = Position::where('name', 'Администратор системы')->first()?->id;
        $itSpecialistPos = Position::where('name', 'Главный специалист - эксперт')->first()?->id;
        $engineerPos   = Position::where('name', 'Инженер')->first()?->id;
        $hrSpecialistPos = Position::where('name', 'Специалист отдела кадров')->first()?->id;
        $legalPos      = Position::where('name', 'Юрисконсульт')->first()?->id;
        $financePos    = Position::where('name', 'Ведущий специалист финансового отдела')->first()?->id;
        $externalPos   = Position::where('name', 'Внешний консультант')->first()?->id;

        $admin = User::create([
            'name'              => 'Алексей',
            'surname'           => 'Волков',
            'patronymic'        => 'Игоревич',
            'email'             => 'admin@example.com',
            'password'          => Hash::make('password'),
            'department_id'     => null,
            'position_id'       => $adminPos,
            'phone'             => '+7(83540)10001',
            'internal_phone'    => '4501',
            'telegram_username' => '@admin_volkov',
            'max_username'      => 'admin_volkov',
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('admin');

        $it1 = User::create([
            'name'              => 'Дмитрий',
            'surname'           => 'Соколов',
            'patronymic'        => 'Андреевич',
            'email'             => 'it1@example.com',
            'password'          => Hash::make('password'),
            'department_id'     => $itDept?->id,
            'position_id'       => $itSpecialistPos,
            'phone'             => '+7(83540)21381',
            'internal_phone'    => '4502',
            'telegram_username' => '@it_sokolov',
            'max_username'      => 'it_sokolov',
            'email_verified_at' => now(),
        ]);
        $it1->assignRole('it_specialist');

        $it2 = User::create([
            'name'              => 'Максим',
            'surname'           => 'Кузнецов',
            'patronymic'        => 'Алексеевич',
            'email'             => 'it2@example.com',
            'password'          => Hash::make('password'),
            'department_id'     => $itDept?->id,
            'position_id'       => $engineerPos,
            'phone'             => '+7(83540)23143',
            'internal_phone'    => '4503',
            'telegram_username' => '@it_kuznetsov',
            'max_username'      => 'it_kuznetsov',
            'email_verified_at' => now(),
        ]);
        $it2->assignRole('it_specialist');

        $userHr = User::create([
            'name'              => 'Елена',
            'surname'           => 'Михайлова',
            'patronymic'        => 'Владимировна',
            'email'             => 'hr@example.com',
            'password'          => Hash::make('password'),
            'department_id'     => $hrDept?->id,
            'position_id'       => $hrSpecialistPos,
            'phone'             => '+7(83540)21432',
            'internal_phone'    => '4504',
            'telegram_username' => '@hr_mikhaylova',
            'max_username'      => 'hr_mikhaylova',
            'email_verified_at' => now(),
        ]);
        $userHr->assignRole('user');

        $userLegal = User::create([
            'name'              => 'Андрей',
            'surname'           => 'Крылов',
            'patronymic'        => 'Сергеевич',
            'email'             => 'legal@example.com',
            'password'          => Hash::make('password'),
            'department_id'     => $legalDept?->id,
            'position_id'       => $legalPos,
            'phone'             => '+7(83540)21433',
            'internal_phone'    => '4505',
            'telegram_username' => '@legal_krylov',
            'max_username'      => 'legal_krylov',
            'email_verified_at' => now(),
        ]);
        $userLegal->assignRole('user');

        $userFinance = User::create([
            'name'              => 'Татьяна',
            'surname'           => 'Воробьева',
            'patronymic'        => 'Петровна',
            'email'             => 'finance@example.com',
            'password'          => Hash::make('password'),
            'department_id'     => $financeDept?->id,
            'position_id'       => $financePos,
            'phone'             => '+7(83540)21545',
            'internal_phone'    => '4506',
            'telegram_username' => '@finance_vorobeva',
            'max_username'      => 'finance_vorobeva',
            'email_verified_at' => now(),
        ]);
        $userFinance->assignRole('user');

        User::create([
            'name'              => 'Игорь',
            'surname'           => 'Морозов',
            'patronymic'        => 'Викторович',
            'email'             => 'external@example.com',
            'password'          => Hash::make('password'),
            'department_id'     => null,
            'position_id'       => $externalPos,
            'phone'             => '+7(83540)20000',
            'internal_phone'    => '4507',
            'telegram_username' => '@external_morozov',
            'max_username'      => 'external_morozov',
            'email_verified_at' => now(),
        ])->assignRole('user');
    }
}
