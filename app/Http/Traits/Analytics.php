<?php

namespace App\Http\Traits;

use App\Library\Arr;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Deposit;
use App\Models\Enrollment;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdrawal;

trait Analytics {

    function compileStats(){
        $users = User::all();
        $courses = Courses::all();
        $batches = Batch::all();
        $withdrawals = Withdrawal::all();
        $deposits = Deposit::all();
        $transactions = Transaction::all();
        $enrollments = Enrollment::all();
        $wallet = Wallet::all();

        $no_batches = $batches->count();
        $no_users = $users->count();
        $no_mentors = $users->where('role', 'mentor')->count();
        $no_students = $users->where('role', 'user')->count();
        $no_courses = $courses->count();
        $no_active_batches = $batches->where('status', 'ongoing')->count();
        $total_withdrawals = $withdrawals->where('status', 'successful')->sum('amount');
        $total_deposits = $deposits->sum('amount');
        $total_transactions = $transactions->sum('amount');
        $no_enrollments = $enrollments->count();

        return Arr::toObject([
            'no_batches' => $no_batches,
            'no_users' => $no_users,
            'no_mentors' => $no_mentors,
            'no_students' => $no_students,
            'no_courses' => $no_courses,
            'no_active_batches' => $no_active_batches,
            'total_withdrawals' => $total_withdrawals,
            'total_deposits' => $total_deposits,
            'total_transactions' => $total_transactions,
            'no_enrollments' => $no_enrollments
        ]);
    }

}
