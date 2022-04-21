<header class="flex align-center flex-wrap flex-row lg:flex-column lg:flex-nowrap border-black max-w-screen-3xl mx-auto">
  <div class="vigia-magazine-slider border-r-3 border-black w-full lg:w-1/2">
    <x-image-slider :images="get_field( 'images' )" />
  </div>
  <div class="flex align-center flex-wrap w-full content-between lg:w-1/2 p-5 lg:p-10 mx-auto sm:max-w-md lg:max-w-none">
    <h1 class="block normal-case">{{ the_field( 'number' )}} – {{ the_title() }}</h1>
    <div class="block mb-5">{{ the_field( 'lead' ) }} </div>
    <x-button-order class="mb-0 lg:ml-0 lg:mb-0" :product="get_field( 'main_product' )"/>
  </div>
</header>
