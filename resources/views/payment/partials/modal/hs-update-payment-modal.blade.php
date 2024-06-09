<div id="hs-update-payment-{{ $paymentData->id }}-modal"
  class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
  <div
    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
    <div
      class="flex flex-col w-full bg-white rounded pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <form method="post"
        action="{{ route('payment.update-payment-status', ['paymentId' => $paymentData->id, 'busServiceId' => $paymentData->bus_service_id]) }}">
        @csrf
        @method('patch')

        <div class="relative flex flex-col h-full p-6 overflow-hidden rounded">
          <h1 class="flex items-center pb-4 mb-4 text-4xl leading-none text-gray-900 border-b border-gray-200">
            <span>Update Payment</span>
          </h1>
          <div class="w-full mb-4">
            <h2 class="mb-2 text-sm font-medium tracking-widest text-center text-gray-900 title-font sm:text-left">
              STATUS</h2>
            <nav class="flex flex-col items-center -mb-1 text-center sm:items-start sm:text-left">
              <div class="w-full">
                <div class="relative">
                  <select id="payment_status" name="payment_status"
                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                    <option @selected(old('payment_status', $paymentData->status) == null) value=null disabled>Select payment status</option>
                    <option @selected(old('payment_status', $paymentData->status) == 'Pending') value="Pending">Pending</option>
                    <option @selected(old('payment_status', $paymentData->status) == 'Paid') value="Paid">Paid</option>
                  </select>
                </div>
                <x-input-error :messages="$errors->get('payment_status')" class="mt-2" />
              </div>
            </nav>
          </div>
          <div class="w-full mb-4">
            <h2 class="mb-2 text-sm font-medium tracking-widest text-center text-gray-900 title-font sm:text-left">
              METHOD</h2>
            <nav class="flex flex-col items-center -mb-1 text-center sm:items-start sm:text-left">
              <div class="w-full">
                <div class="relative">
                  <select id="method" name="method"
                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                    <option @selected(old('method', $paymentData->method) == null) value=null disabled>Select payment method</option>
                    <option @selected(old('method', $paymentData->method) == null) value=null>-</option>
                    <option @selected(old('method', $paymentData->method) == 'Cash') value="Cash">Cash</option>
                    <option @selected(old('method', $paymentData->method) == 'Debit/Credit Card') value="Debit/Credit Card">Debit/Credit Card</option>
                  </select>
                </div>
                <x-input-error :messages="$errors->get('method')" class="mt-2" />
              </div>
            </nav>
          </div>
          <button type="submit"
            class="flex items-center w-full px-4 py-2 mt-4 text-white bg-[#08183A] border-0 rounded focus:outline-none hover:bg-[#08183A]/[.8]">
            Update
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
