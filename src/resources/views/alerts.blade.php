<alerts class="overflow-hidden" v-cloak :init-alerts='@json(session('alerts', collect())->toArray())'></alerts>

{{ session()->forget('alerts') }}