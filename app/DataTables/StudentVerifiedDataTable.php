<?php

namespace App\DataTables;

use App\Models\StudentVerified;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StudentVerifiedDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('Bukti Diterima', function(User $user) {
                $btn = null;
                if ($user->id == Auth::id()) {
                     $btn = "<a href='" . route('print.pdf') . "' class='btn btn-danger btn-sm'><i class='fa-solid fa-file-pdf'></i></a>";
                }
                return $btn;
            })
            ->addColumn('Status Diterima', function(User $user) { 
                $buttonClass = $user->isUserVerfied ? 'btn-success' : 'btn-danger';
                $buttonText = $user->isUserVerfied ? 'Lolos Seleksi' : 'Tidak Lolos Seleksi';

                return '<button type="button" class="btn btn-sm ' . $buttonClass . '" style="--bs-bg-opacity: 0.5;">' . $buttonText . '</button>';
            })
            ->rawColumns(['Status Diterima', 'Bukti Diterima'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()
                    ->where('isUserVerfied', 1)
                    ->orderByDesc("avg_value_student");
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('studentverified-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => ['print', 'reload'],
                        'language' => [
                            'searchPlaceholder' => 'Cari nama anda...',
                            'info' => '',
                            'zeroRecords' => 'Mohon maaf, nama anda tidak terdafar pada tabel pengumuman.',
                            'oPaginate' => [
                                'sNext' => 'Selanjutnya',
                                'sPrevious' => 'Sebelumnya'
                            ]
                        ]
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('fullname')
                  ->title('Nama Lengkap')
                  ->width(300),
            Column::make('nisn')->title('NISN'),
            Column::make('avg_value_student')->title('Nilai Rata-Rata'),
            Column::make('Status Diterima')
                  ->width(100)
                  ->addClass('text-center'),
            Column::computed('Bukti Diterima')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'StudentVerified_' . date('YmdHis');
    }
}
