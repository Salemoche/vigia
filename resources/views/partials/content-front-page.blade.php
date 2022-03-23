@foreach ( get_field( 'magazines' ) as $selected_magazine )
  <x-front-page-section :magazine="$selected_magazine" />
@endforeach
