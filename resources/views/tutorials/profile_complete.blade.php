@forelse ($activities as $date => $activity)
    <h2 class="text-4xl font-bold text-center">
        {{ ucwords($date) }}
    </h2>
    
    @foreach($activity as $record)
        @include('tutorials.profile_type', ['activity' => $record])
    @endforeach
@empty
    <h3 class="text-center mt-5">
        Pas d'activité!
    </h3>
@endforelse