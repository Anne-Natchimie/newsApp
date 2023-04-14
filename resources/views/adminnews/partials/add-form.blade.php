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

<form action="{{route('news.add')}}" method="post" enctype="multipart/form-data">
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
    placeholder="Saisissez un texte"
    class="w-full rounded-md border-white bg-white py-3 px-6 text-base text-black font-medium focus:border-[#6A64F1]">

    @error('titre')
      Vous devez saisir un titre
    @enderror

  </div>
  
  <div class="mb-5">

    <label 
    for="image" 
    class="mb-3 block text-base font-medium text-white-700">
    Image
    </label>

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

    <textarea name="description" class="w-full rounded-md border-white bg-white py-3 px-6 h-56 text-base text-black font-medium focus:border-[#6A64F1]"></textarea>
    
    @error('description')
      Ajoutez une description
    @enderror

  </div>

  <div class="mb-5">

    <button class="bg-[#6A64F1] px-8 py-3 text-white rounded-md font-bold" >Ajouter</button>

  </div>

</form> 