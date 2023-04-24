<!-- component -->
<!DOCTYPE html>
<html>
    
    <body class="bg-black">
        <!-- AsuniiaLeVrai#4610 -->
        <div class="m-10">
            <h1 class=" text-white font-bold text-2xl tracking-wide">News</h1>
        </div>

        

        <div class="flex justify-between grid-cols-3 gap-6 m-10 mb-10">
            <!-- START Card component -->

            @forelse ($news as $itemActu)

            <article class="h-max container bg-white shadow-2xl rounded-2xl p-5">


                <h1 class="font-bold text-blue-700">{{$itemActu->titre}}</h1>
                <p class="font-light text-gray-500 hover:font-bold">{{Str::limit($itemActu->description, 100)}}</p>
                <h6 class="text-sm text-gray-300 mb-5">{{$itemActu->created_at}}</h6>
                <img src="{{Storage::url($itemActu->image)}}" alt="">
        
            </article>

            @empty
            
            @endforelse

            <!-- END Card component -->
        </div>

        
    </body>
</html>