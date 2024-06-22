<div class="flex flex-col w-full px-6 py-8 gap-y-6">
  <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
    <div class="flex flex-col w-full">
      <h1 class="text-xl font-bold">Friendly Reminder to All Parent/Guardian</h1>
      <p class="text-sm leading-relaxed">Please read and adhere to the monthly payment rules.</p>
    </div>

    <div class="p-6 border-l-4 border-[#08183A] rounded-r-xl bg-indigo-50">
      <div class="flex">
        <div class="ml-3">
          <div class="mt-2 text-sm text-[#08183A]">
            <ul role="list" class="pl-5 space-y-1 list-disc">
              <li>Total fee for every month will remain the same (full) despite of having school holidays in any month.
              </li>
              <li>This website only accept credit or debit card payment.</li>
              <li>For cash payment, the fee must be given directly to the bus driver or directly to the owner.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="flex flex-col w-full mt-4">
      <h1 class="text-xl font-bold">
        {{ $busServiceData->student->first_name }} {{ $busServiceData->student->last_name }} Payment Record
      </h1>
      <p class="text-sm leading-relaxed">Select months to pay or update payment.</p>
    </div>

    <div class="w-full mt-2 overflow-auto">
      <table class="w-full text-sm text-center whitespace-no-wrap table-fixed">
        <thead>
          <tr class="font-medium tracking-wider text-gray-900 bg-gray-100">
            <th class="px-4 py-3 text-left rounded-tl rounded-bl">Month</th>
            <th class="px-4 py-3">Payment Status</th>
            <th class="px-4 py-3">Payment Date</th>
            <th class="px-4 py-3">Payment Method</th>
            <th class="px-4 py-3">Monthly Fee (RM)</th>
            <th class="px-4 py-3 text-right rounded-tr rounded-br">Select Month to Pay</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($payment as $paymentData)
            <tr class="border-b-2 border-gray-200">
              <td class="px-4 py-3 text-left">{{ $paymentData->month }}</td>
              <td class="px-4 py-3">
                @if ($paymentData->status === 'Pending')
                  <span class="px-3 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full">
                    {{ $paymentData->status }}
                  </span>
                @elseif ($paymentData->status === 'Paid')
                  <span class="px-3 py-1 text-xs font-medium text-teal-800 bg-teal-100 rounded-full">
                    {{ $paymentData->status }}
                  </span>
                @endif
              </td>
              <td class="px-4 py-3">
                @if ($paymentData->date)
                  {{ Carbon\Carbon::parse($paymentData->date)->format('d/m/Y') }}
                @else
                  -
                @endif
              </td>
              <td class="px-4 py-3">
                @if ($paymentData->method)
                  {{ $paymentData->method }}
                @else
                  -
                @endif
              </td>
              <td class="px-4 py-3">{{ number_format($paymentData->fee, 2, '.') }}</td>
              <td class="flex justify-end px-4 py-3 text-right">
                @if (Auth::user()->role === 'customer')
                  @if ($paymentData->status === 'Pending')
                    <input type="checkbox" name="selected_month[]" value="{{ $paymentData->id }}"
                      wire:model.live="selectedMonth" form="main-form">
                  @endif
                @elseif (Auth::user()->role === 'admin')
                  <div class="hs-dropdown">
                    <button type="button" id="hs-dropdown-custom-icon-trigger">
                      <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-ellipsis-vertical">
                        <circle cx="12" cy="12" r="1" />
                        <circle cx="12" cy="5" r="1" />
                        <circle cx="12" cy="19" r="1" />
                      </svg>
                    </button>
                    <div
                      class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded p-2 mt-2"
                      aria-labelledby="hs-dropdown-custom-icon-trigger">
                      <button type="button"
                        class="flex items-center w-full px-3 py-2 text-sm rounded hover:bg-gray-100"
                        data-hs-overlay="#hs-update-payment-{{ $paymentData->id }}-modal">
                        Update Payment Status
                      </button>
                    </div>
                  </div>
                @endif
              </td>
            </tr>
            @include('payment.partials.modal.hs-update-payment-modal')
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="flex items-center mt-4 gap-x-4">
      <form id="main-form" method="post" action="{{ route('payment.patch-record', $busServiceData->id) }}">
        @csrf
        @method('patch')

        <button type="button" data-hs-overlay="#hs-payment-modal"
          class="px-8 py-2 text-sm text-white bg-[#08183A] rounded w-max focus:outline-none hover:bg-[#08183A]/[.8]">
          Pay Fee
        </button>
      </form>
      <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
        href="{{ route('payment.view') }}">
        Cancel
      </a>
    </div>
    @include('payment.partials.modal.hs-payment-modal')
  </div>
</div>
