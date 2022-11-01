<div class="flex flex-row justify-center items-center">  
    <label class="w-1/5 uppercase tracking-wide text-cyan-400 dark:text-white text-xs font-bold flex justify-center items-center"
    for="name">{{ $week_day }}</label>
    <div class="w-2/5 md:w-1/2 ">
        <div class="px-4 mb-6 md:mb-0">
            
            <select 
            class="w-full text-cyan-400 dark:text-cyan-700" autocomplete="off"
            name="{{ $id }}_start_time" id="{{ $id }}_start_time">
                <option {{ ( empty($workday['start']) ? "selected":"") }} disabled="disabled">Horário de Inicio</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '01:00:00' ? "selected":"") }} value="01:00">01:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '02:00:00' ? "selected":"") }} value="02:00">02:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '03:00:00' ? "selected":"") }} value="03:00">03:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '04:00:00' ? "selected":"") }} value="04:00">04:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '05:00:00' ? "selected":"") }} value="05:00">05:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '06:00:00' ? "selected":"") }} value="06:00">06:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '07:00:00' ? "selected":"") }} value="07:00">07:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '08:00:00' ? "selected":"") }} value="08:00">08:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '09:00:00' ? "selected":"") }} value="09:00">09:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '10:00:00' ? "selected":"") }} value="10:00">10:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '11:00:00' ? "selected":"") }} value="11:00">11:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '12:00:00' ? "selected":"") }} value="12:00">12:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '13:00:00' ? "selected":"") }} value="13:00">13:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '14:00:00' ? "selected":"") }} value="14:00">14:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '15:00:00' ? "selected":"") }} value="15:00">15:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '16:00:00' ? "selected":"") }} value="16:00">16:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '17:00:00' ? "selected":"") }} value="17:00">17:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '18:00:00' ? "selected":"") }} value="18:00">18:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '19:00:00' ? "selected":"") }} value="19:00">19:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '20:00:00' ? "selected":"") }} value="20:00">20:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '21:00:00' ? "selected":"") }} value="21:00">21:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '22:00:00' ? "selected":"") }} value="22:00">22:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '23:00:00' ? "selected":"") }} value="23:00">23:00</option>
                <option {{ ( isset($workday['start']) && $workday['start'] == '00:00:00' ? "selected":"") }} value="00:00">00:00</option>
            </select>

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="w-2/5 md:w-1/2 ">
        <div class=" px-4 mb-6 md:mb-0">
        <select 
        class="w-full text-cyan-400 dark:text-cyan-700"
        name="{{ $id }}_end_time" id="{{ $id }}_end_time">
        <option {{ ( empty($workday['end']) ? "selected":"") }} disabled="disabled">Horário de Inicio</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '01:00:00' ? "selected":"") }} value="01:00">01:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '02:00:00' ? "selected":"") }} value="02:00">02:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '03:00:00' ? "selected":"") }} value="03:00">03:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '04:00:00' ? "selected":"") }} value="04:00">04:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '05:00:00' ? "selected":"") }} value="05:00">05:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '06:00:00' ? "selected":"") }} value="06:00">06:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '07:00:00' ? "selected":"") }} value="07:00">07:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '08:00:00' ? "selected":"") }} value="08:00">08:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '09:00:00' ? "selected":"") }} value="09:00">09:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '10:00:00' ? "selected":"") }} value="10:00">10:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '11:00:00' ? "selected":"") }} value="11:00">11:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '12:00:00' ? "selected":"") }} value="12:00">12:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '13:00:00' ? "selected":"") }} value="13:00">13:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '14:00:00' ? "selected":"") }} value="14:00">14:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '15:00:00' ? "selected":"") }} value="15:00">15:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '16:00:00' ? "selected":"") }} value="16:00">16:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '17:00:00' ? "selected":"") }} value="17:00">17:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '18:00:00' ? "selected":"") }} value="18:00">18:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '19:00:00' ? "selected":"") }} value="19:00">19:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '20:00:00' ? "selected":"") }} value="20:00">20:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '21:00:00' ? "selected":"") }} value="21:00">21:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '22:00:00' ? "selected":"") }} value="22:00">22:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '23:00:00' ? "selected":"") }} value="23:00">23:00</option>
        <option {{ ( isset($workday['end']) && $workday['end'] == '00:00:00' ? "selected":"") }} value="00:00">00:00</option>
            </select>

            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>