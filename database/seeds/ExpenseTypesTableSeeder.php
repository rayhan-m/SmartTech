<?php

use App\ExpenseType;
use Illuminate\Database\Seeder;

class ExpenseTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expense_type =new ExpenseType();
        $expense_type->name="Utility Bill";
        $expense_type->save();
        $expense_type =new ExpenseType();
        $expense_type->name="Rent";
        $expense_type->save();
    }
}