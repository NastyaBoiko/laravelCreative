<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Imports\PostsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCommand extends Command
{

    protected $signature = 'import:excel';

    protected $description = 'Get data from excel';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        Excel::import(new PostsImport(), 'public/excel/posts.xlsx');

        dd('finish');
    }
}
