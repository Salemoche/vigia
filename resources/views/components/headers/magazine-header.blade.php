<header class="flex align-center pt-15 lg:pt-0 flex-wrap flex-row lg:flex-column lg:flex-nowrap border-b-3 border-black">
  <div class="vigia-magazine-slider border-r-3 border-black w-full lg:w-1/2">
    <x-image-slider :images="get_field( 'images' )" />
  </div>
  <div class="flex align-center flex-wrap w-full lg:w-1/2 p-5 lg:p-10">
    <h1 class="block normal-case">{{ the_field( 'number' )}} – {{ the_title() }}</h1>
    <div class="block mb-5">{{ the_field( 'lead' ) }} </div>
    <x-button-order class="mb-0 lg:ml-0 lg:mb-0" :product="get_field( 'main_product' )"/>
  </div>
</header>
