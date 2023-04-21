<!--
  <form action="https://formbold.com/s/FORM_ID" method="POST">
    <div class="mb-5">
        <label
        for="name"
        class="mb-3 block text-base font-medium text-white"
        >
        Titre
        </label>
        <input
        type="text"
        name="name"
        id="name"
        placeholder="Saissisez un titre"
        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
    </div>
    
    <div class="mb-5">
      <label
        for="subject"
        class="mb-3 block text-base font-medium text-white"
      >
        Image
      </label>
      <input
        type="text"
        name="subject"
        id="subject"
        placeholder="Ajoutez une image"
        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
      />
    </div>
    
    <div class="mb-5">
      <label
        for="message"
        class="mb-3 block text-base font-medium text-white"
      >
        Description
      </label>
      <textarea
        rows="4"
        name="message"
        id="message"
        placeholder="Mettre une description"
        class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
      ></textarea>
    </div>
    <div>
      <button
        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
      >
        Submit
      </button>
    </div>
  </form>
-->

<form action="{{!empty($actu)?route('news.edit', $actu->id):route('news.add')}}" method="post" enctype="multipart/form-data">
  @csrf

  <div class="mb-5">

    <label 
    for="name" 
    class="mb-3 block text-base font-medium text-white-700">
    Titre
    </label>

    <input 
    type="text" 
    name="titre" 
    value="{{!empty($actu)?$actu->titre:''}}"
    placeholder="Saisissez un texte"
    class="w-full rounded-md border-white bg-white py-3 px-6 text-base text-black font-medium focus:border-[#6A64F1]">

    @error('titre')
      Vous devez saisir un titre
    @enderror

  </div>

  <div class="mb-5">
    
    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
    <select name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option selected>Choose a category</option>

      @foreach ($categories as $category)
      @if (!empty($actu) && $category->id == $actu->category_id)
        <option value="{{$category->id}}"selected>{{$category->name}}</option>
      @else
        <option value="{{$category->id}}">{{$category->name}}</option>
      @endif
      @endforeach

      

    </select>

  </div>

  <div class="mb-5">

    <label 
    for="image" 
    class="mb-3 block text-base font-medium text-white-700">
    Image
    </label>

    @isset($actu)

    <img
      class="h-30 w-20 rounded-full object-cover object-center p-3"
      src="{{Storage::url($actu->image)}}"
      alt=""
    />

    @endisset

    <input 
    type="file" 
    name="image" 
    placeholder="Ajoutez une image"
    class="w-full rounded-md border-white bg-white py-3 px-6 text-base text-black font-medium focus:border-[#6A64F1]">

    @error('image')
      Ajoutez une image au bon format
    @enderror

  </div>

  <div class="mb-5">

    <label 
    for="description" 
    class="mb-3 block text-base font-medium text-white-700">
    Description
    </label>

    <textarea name="description" class="w-full rounded-md border-white bg-white py-3 px-6 h-56 text-base text-black font-medium focus:border-[#6A64F1]">{{!empty($actu)?$actu->description:''}}</textarea>
    
    @error('description')
      Ajoutez une description
    @enderror

  </div>

  <div class="mb-5">

    <button class="bg-[#6A64F1] px-8 py-3 text-white rounded-md font-bold" >{{!empty($actu)?'Modifier':'Ajouter'}}</button>

  </div>

</form> 