<div id="hs-payment-modal"
  class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
  <div
    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
    <div
      class="flex flex-col w-full bg-white rounded pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="relative flex flex-col h-full p-6 overflow-hidden rounded">
        <span class="absolute top-0 right-0 px-3 py-1 text-xs tracking-widest text-white bg-blue-500 rounded-bl">Year
          {{ $payment[0]->year }}</span>
        <h1 class="flex items-center pb-4 mb-4 text-4xl leading-none text-gray-900 border-b border-gray-200">
          <span>Payment Summary</span>
        </h1>
        <div class="flex w-full mx-auto mb-4 overflow-hidden border-2 border-blue-500 rounded">
          <label for="cash"
            class="has-[:checked]:text-white has-[:checked]:bg-blue-500 w-full px-4 py-1 text-center focus:outline-none">
            <input type="radio" name="method" id="cash" value="Cash" class="hidden"
              @checked(old('method', true) == 'Cash') form="main-form">
            <span>Cash</span>
          </label>
          <label for="card"
            class="has-[:checked]:text-white has-[:checked]:bg-blue-500 w-full px-4 py-1 text-center focus:outline-none">
            <input type="radio" name="method" id="card" value="Debit/Credit Card" class="hidden"
              @checked(old('method') == 'Debit/Credit Card') form="main-form">
            <span>Debit/Credit Card</span>
          </label>
        </div>
        <div class="w-full">
          <nav class="flex flex-col items-center -mb-1 text-center sm:items-start sm:text-left">
            <div class="w-full pt-2 border-t border-gray-200">
              @php
                $totalFee = 0;
              @endphp
              @foreach ($payment as $paymentData)
                @foreach ($selectedMonth as $selectedMonthKey)
                  @if ($paymentData->id == $selectedMonthKey)
                    @php
                      $totalFee += $paymentData->fee;
                    @endphp
                    <div class="flex pb-2">
                      <span class="text-gray-500">{{ $paymentData->month }}</span>
                      <span class="ml-auto text-gray-900">{{ number_format($paymentData->fee, 2, '.') }}</span>
                    </div>
                  @endif
                @endforeach
              @endforeach
              <div class="flex py-2 border-t border-gray-200">
                <span class="text-lg font-bold">Total Fee
                  <span class="text-sm font-normal text-gray-400">(RM)</span></span>
                <span class="ml-auto text-lg font-bold text-gray-900">{{ number_format($totalFee, 2, '.') }}</span>
              </div>
            </div>
          </nav>
        </div>
        <button type="submit"
          class="flex items-center w-full px-4 py-2 mt-6 text-white bg-blue-500 border-0 rounded focus:outline-none hover:bg-blue-600"
          form="main-form">
          Make Payment
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>
