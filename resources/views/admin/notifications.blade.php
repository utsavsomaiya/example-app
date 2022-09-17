<div x-data="ehczlyothi" @notify.window="add($event)" class="z-40 fixed bottom-0 right-0 flex w-full max-w-xs flex-col space-y-4 pr-4 pb-4 sm:justify-start" role="status" aria-live="polite">
    <template x-for="notification in notifications" :key="notification.id">
        <div x-data="qlzoqbzppb" x-show="show" x-transition.duration.500ms="" class="pointer-events-auto relative w-full max-w-sm rounded-md border border-gray-200 bg-white py-4 pl-6 pr-4 shadow-lg">
            <div class="flex items-start">
                <div x-show="notification.type === 'info'" class="flex-shrink-0">
                    <span aria-hidden="true" class="inline-flex h-6 w-6 items-center justify-center rounded-full border-2 border-gray-400 text-xl font-bold text-gray-400">!</span>
                </div>
                <div x-show="notification.type === 'success'" class="flex-shrink-0">
                    <span aria-hidden="true" class="inline-flex h-6 w-6 items-center justify-center rounded-full border-2 border-green-600 text-lg font-bold text-green-600">✓</span>
                </div>
                <div x-show="notification.type === 'error'" class="flex-shrink-0">
                    <span aria-hidden="true" class="inline-flex h-6 w-6 items-center justify-center rounded-full border-2 border-red-600 text-lg font-bold text-red-600">×</span>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p x-text="notification.content" class="text-sm font-medium leading-5 text-gray-900"></p>
                </div>
                <div class="ml-4 flex flex-shrink-0">
                    <button @click="transitionOut()" type="button" class="inline-flex text-gray-400">
                        <svg aria-hidden="" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>

@if(session('success'))
    <div x-data="{ content: '{{ session('success') }}', type:'success' }">
        <div x-init="$dispatch('notify', { content, type })"></div>
    </div>
@endif

@if(session('error'))
    <div x-data="{ content: '{{ session('error') }}', type:'error' }">
        <div x-init="$dispatch('notify', { content, type })"></div>
    </div>
@endif

@if(session('info'))
    <div x-data="{ content: '{{ session('info') }}', type:'info' }">
        <div x-init="$dispatch('notify', { content, type })"></div>
    </div>
@endif

<script>document.addEventListener('alpine:init', () => {
    Alpine.data('ehczlyothi', () => ({ notifications: [], add(e) { this.notifications.push({ id: e.timeStamp, type: e.detail.type, content: e.detail.content, }) }, remove(notification) { this.notifications = this.notifications.filter(i => i.id !== notification.id) }, }))

    Alpine.data('qlzoqbzppb', () => ({ show: false, init() {
        this.$nextTick(() => this.show = true)
        setTimeout(() => this.transitionOut(), 2000)
        }, transitionOut() {
        this.show = false
        setTimeout(() => this.remove(this.notification), 500) }, }))
})</script>

