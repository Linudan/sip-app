<?php
namespace Database\Seeders;

use App\Models\User;
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

        $admin = User::create([
            'name'              => 'Алексей',
            'surname'           => 'Волков',
            'patronymic'        => 'Игоревич',
            'email'             => 'admin@example.com',
            'password'          => Hash::make('password'),
            'department_id'     => null,
            'position'          => 'Администратор системы',
            'phone'             => '+7(83540)10001',
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
            'position'          => 'Главный специалист отдела информатизации',
            'phone'             => '+7(83540)21381',
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
            'position'          => 'Инженер отдела информатизации',
            'phone'             => '+7(83540)23143',
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
            'position'          => 'Специалист отдела кадров',
            'phone'             => '+7(83540)21432',
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
            'position'          => 'Юрисконсульт',
            'phone'             => '+7(83540)21433',
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
            'position'          => 'Ведущий специалист финансового отдела',
            'phone'             => '+7(83540)21545',
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
            'position'          => 'Внешний консультант',
            'phone'             => '+7(83540)20000',
            'telegram_username' => '@external_morozov',
            'max_username'      => 'external_morozov',
            'email_verified_at' => now(),
        ])->assignRole('user');
    }
}
