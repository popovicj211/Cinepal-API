<?php


namespace App\Services;
use App\Contracts\SlidesContract;
use App\DTO\SlidesDTO;
use App\Helpers\ImageResize;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\SlidesRequest;
use App\Models\Images;
use App\Models\Slides;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SlidesService extends BaseService implements SlidesContract
{

    public function __construct(ImageResize $rimg)
    {
        parent::__construct($rimg);
        $this->rimg = $rimg;
    }

    function getSlides(): array
         {
             $slides = Slides::with('img')->get();
            $slidesArr = [];

            foreach ($slides as $slide)
             {
                 $slideDTO = new SlidesDTO();

                 $slideDTO->id = $slide->id;
                 $slideDTO->img = $slide->img->link;
                 $slideDTO->header = $slide->header;
                 $slideDTO->text = $slide->text;

                 $slidesArr[] = $slideDTO;
             }

             return $slidesArr;

         }
         public function findSlide(int $id): SlidesDTO
         {
             $slide = Slides::with('img')->findOrFail($id);
             If($slide != null) {
                 $slideDTO = new SlidesDTO();
                 $slideDTO->id = $slide->id;
                 $slideDTO->img = $slide->img->link;
                 $slideDTO->header = $slide->header;
                 $slideDTO->text = $slide->text;
                 return $slideDTO;
             }
         }

        public function addSlide(SlidesRequest $request)
        {
            $hasFile = $request->hasFile('slideImage');
            $file = $request->file('slideImage');
            $this->rimg->setHasFile($hasFile);
            $this->rimg->setFile($file);
            $resizeImg = $this->rimg->resizeImg(2000,800 );
            $linkImg =  $resizeImg['link'];
            $header = $request->get('header');
            $text = $request->get('text');

            $image = Images::create([
                    'link' => $linkImg
            ]);
            $image->save();
            $slide = Slides::create([
                 'img_id' =>  DB::getPdo()->lastInsertId(),
                'header' => $header,
                 'text' => $text
            ]);

            $slide->save();
       }

       public function modifySlide(Request $request, int $id )
        {
            $request->validate([
                    'slideImage' => 'nullable|file|mimes:jpg,jpeg,png|max:2000',
                      'header' => 'required|min:3',
                       'text' => 'nullable|min:5'
            ]);

            $hasFile = $request->hasFile('slideImage');
            $file = $request->file('slideImage');
            $header = $request->get('header');
            $text = $request->get('text');
            $linkImg = null;

            if($hasFile){
                $this->rimg->setHasFile($hasFile);
                $this->rimg->setFile($file);
                $resizeImg = $this->rimg->resizeImg(2000,800 );
                $linkImg =  $resizeImg['link'];

            }else{
                $defImage = Images::findOrFail($id);
                $linkImg  = $defImage->link;
            }

            $images = Images::findOrFail($id);
            $images->update([
                    'link' => $linkImg,
                   'updated_at' => Carbon::now()->toDateTime()
            ]);

            $slides = Slides::where('img_id' ,$id);
            $slides->update([
                'header' => $header,
                'text' => $text,
                'updated_at' => Carbon::now()->toDateTime()
            ]);
        }

        public function deleteSlide(int $id )
        {

            $slides = Images::findOrFail($id);
            if ($slides != null ) {
                $linkImg  = $slides->link;
                $image_path = "/assets/images/movies/".$linkImg;
                if(\File::exists($image_path)){
                    \File::delete($image_path);
                }
                $slides->delete();
            }

        }

}
