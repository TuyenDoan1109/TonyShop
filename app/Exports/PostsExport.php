<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;


//class PostsExport implements FromCollection
//{
//    use Exportable;
//    /**
//    * @return \Illuminate\Support\Collection
//    */
//    public function collection()
//    {
////        return Post::all();
//        return new Collection([
//            // use Illuminate\Database\Eloquent\Collection;
//            // class PostsExport implements FromCollection
//            ['Tuyen', 'doantuyen@gmail.com'],
//            ['thang', 'thang@gmail.com'],
//        ]);
//    }
//}



//class PostsExport implements FromArray
//{
//    use Exportable;
//    public function array() : array
//    {
//        return [
//            ['Tuyen', 'doantuyen@gmail.com'],
//            ['thang', 'thang@gmail.com'],
//        ];
//    }
//}



//class PostsExport implements FromView, ShouldAutoSize
//{
////    use Maatwebsite\Excel\Concerns\FromView;  //Import
////    use Illuminate\Contracts\View\View;   //Import
//
//    use Exportable;
//    public function view(): View
//    {
//        return view('admin.exports.posts.posts', [
//            'posts' => Post::all(),
//        ]);
//    }
//}

//class PostsExport implements FromCollection, ShouldAutoSize, WithMapping
//{
//    use Exportable;
//
//    public function collection()
//    {
//        return Post::all();
//    }
//
//    public function map($post) : array
//    {
//        return [
//            $post->id,
//            $post->name,
//            $post->content,
//        ];
//    }
//}


//class PostsExport implements FromCollection, ShouldAutoSize, WithMapping
//{
//    use Exportable;
//
//    public function collection()
//    {
//        return Post::with('admin')->get();
//    }
//
//    public function map($post) : array
//    {
//        return [
//            $post->id,
//            $post->name,
//            $post->content,
//            $post->admin->name
//        ];
//    }
//}


//class PostsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
//{
//    use Exportable;
//
//    public function collection()
//    {
//        return Post::with('admin')->get();
//    }
//
//    public function map($post) : array
//    {
//        return [
//            $post->id,
//            $post->name,
//            $post->content,
//            $post->admin->name
//        ];
//    }
//
//    public function headings(): array
//    {
//        return [
//            ' ', // Can't be empty, at least have a space
//            'Name',
//            'Content',
//            'Admin Name',
//        ];
//    }
//}


//class PostsExport implements
//    FromCollection,
//    ShouldAutoSize,
//    WithMapping,
//    WithHeadings,
//    WithEvents
//{
//    use Exportable;
//
//    public function collection()
//    {
//        return Post::with('admin')->get();
//    }
//
//    public function map($post) : array
//    {
//        return [
//            $post->id,
//            $post->name,
//            $post->content,
//            $post->admin->name
//        ];
//    }
//
//    public function headings(): array
//    {
//        return [
//            ' ', // Can't be empty, at least have a space
//            'Name',
//            'Content',
//            'Admin Name',
//        ];
//    }
//
//    public function registerEvents(): array
//    {
//        return [
//            AfterSheet::class => function (AfterSheet $event) {
//                $event->sheet->getStyle('A1:D1')->applyFromArray([
//                    'font' => [
//                        'bold' => true
//                    ],
//                    'borders' => [
//                        'outline' => [
//                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
//                            'color' => ['argb' => 'FFFF0000'],
//                        ],
//                    ],
//                ]);
//            }
//        ];
//    }
//}


//class PostsExport implements
//    ShouldAutoSize,
//    WithMapping,
//    WithHeadings,
//    WithEvents,
//    FromQuery
//{
//    use Exportable;
//
//    public function query()
//    {
//        return Post::query()->with('admin');
//    }
//
//    public function map($post) : array
//    {
//        return [
//            $post->id,
//            $post->name,
//            $post->content,
//            $post->admin->name
//        ];
//    }
//
//    public function headings(): array
//    {
//        return [
//            ' ', // Can't be empty, at least have a space
//            'Name',
//            'Content',
//            'Admin Name',
//        ];
//    }
//
//    public function registerEvents(): array
//    {
//        return [
//            AfterSheet::class => function (AfterSheet $event) {
//                $event->sheet->getStyle('A1:D1')->applyFromArray([
//                    'font' => [
//                        'bold' => true
//                    ],
//
//                ]);
//            }
//        ];
//    }
//}



class PostsExport implements
    ShouldAutoSize,
    WithMapping,
    WithHeadings,
    WithEvents,
    FromQuery,
    WithDrawings,
    WithCustomStartCell,
    WithTitle
{
    use Exportable;
    private $year;
    private $month;

    public function __construct(int $year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function query()
    {
        return Post::query()
            ->with('admin')
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month);
    }

    public function map($post) : array
    {
        return [
            $post->id,
            $post->name,
            $post->content,
            $post->admin->name,
            $post->created_at
        ];
    }

    public function headings(): array
    {
        return [
            ' ', // Can't be empty, at least have a space
            'Name',
            'Content',
            'Admin Name',
            'Created At'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A9:E9')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],

                ]);
            }
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/Nobita.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B3');

        return $drawing;
    }

    public function startCell(): string
    {
        return 'A9';
    }

    public function title(): string
    {
        // this not working https://www.youtube.com/watch?v=e890k_0SOno&t=2s
//        return DateTime::createFromFormat('!m', $this->month)->format('F');

        return 'Month ' . $this->month;
    }

}
