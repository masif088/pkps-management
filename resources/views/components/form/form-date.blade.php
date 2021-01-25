<div class="form-group col-span-6 sm:col-span-5" wire:ignore>
    <label for="{{$title}}">{{$title}}</label>
    <div class='input-group date' id='{{str_replace(".", "", $model)}}_date'>
        <span class="input-group-addon">
{{--            <span class="fas fa-calender"></span>--}}
            <span class="fas fa-calendar-alt"></span>
          </span>
        <input type='text' class="form-control" id='{{str_replace(".", "", $model)}}'/>

    </div>
    @error($model) <span class="error">{{ $message }}</span> @enderror

    <script>
        document.addEventListener('livewire:load', function () {

            if (@this.get('{{$model}}') != '') {
                $("#{{str_replace(".", "", $model)}}_date").datetimepicker({
                    date: new Date(@this.get('{{$model}}'))
                });
            }

            $("#{{str_replace(".", "", $model)}}_date").datetimepicker();

            $("#{{str_replace(".", "", $model)}}_date").on('dp.change', function (e) {
                var elem = $("#{{str_replace(".", "", $model)}}").val().split(' ');
                var stSplit = elem[1].split(":");// alert(stSplit);
                var stHour = stSplit[0];
                var stMin = stSplit[1];
                var stAmPm = elem[2];

                if (stAmPm === 'PM') {
                    if (stHour != 12) {
                        stHour = stHour * 1 + 12;
                    }
                } else if (stAmPm == 'AM' && stHour == '12') {
                    stHour = stHour - 12;
                }
            @this.set('{{$model}}', elem[0] + " " + stHour + ':' + stMin);

            });
        });

    </script>
</div>
