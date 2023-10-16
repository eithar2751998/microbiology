
<main class="overflow-hidden">
    <div class="container">
        <div class="wrapper popreveal">
            <div class="main-heading">
                {{$this->key+1}}

                <br>
                {!! $questions[$key]->title !!}
            </div>
            <div class="pole-form">

                <!-- form -->
                <form class="show-section" id="steps" method="post">


                    <!-- step 1 -->
{{--                    <fieldset id="step1" class="fields">--}}
                        @foreach($questions[$key]->answers as $index => $answer)
{{--                            {{dd($questions[$key]->answers)}}--}}
                            <div class=" radiofield revealfield">
                                <input type="radio" name="opt1" id="{{ $answer->id }}" value="{{ $answer->id }}"
                                       wire:model="questions.{{ $key }}.selected_answer"
                                       wire:change="correct_answer({{$key}})"
                                       class="{{ $correct_answer == $answer->id ? 'correct-answer' : ''}}{{((int)$questions[$key]['selected_answer'] == $answer->id && (int)$questions[$key]['selected_answer'] != $correct_answer) ? 'wrong-answer' : '' }}">
                                <label>{{$answer->text}}</label>
                            </div>
                        @endforeach

                        <!-- next btn -->
{{--                        <button type="button" name="next" wire:click="next()"> Next </button>--}}
                        <div class="next_prev">
                            <button type="button" class="next btn-primary" wire:click="next">
                                <span>Next</span>
                            </button>
                        </div>
{{--                    </fieldset>--}}
                </form>
            </div>
        </div>
    </div>
</main>
@push('js')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('test', function(selected_answer) {
                alert(selected_answer);
            });
        });
    </script>
@endpush

