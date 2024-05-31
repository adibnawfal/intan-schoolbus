<x-app-layout>
  <x-slot name="title">
    {{ __('Payment Record') }}
  </x-slot>

  <div class="flex flex-col w-full px-6 py-8 gap-y-6">
    <div class="flex flex-col p-4 bg-white shadow sm:p-8 sm:rounded gap-y-4">
      <div class="flex flex-col w-full">
        <h1 class="text-xl font-bold">Friendly Reminder to All Parent/Guardian</h1>
        <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>

      <div class="p-6 border-l-4 border-blue-600 rounded-r-xl bg-blue-50">
        <div class="flex">
          <div class="ml-3">
            <div class="mt-2 text-sm text-blue-600">
              <ul role="list" class="pl-5 space-y-1 list-disc">
                <li>Payment must made in the first week for every month.</li>
                <li>Total fee for every month will remain the same (full) despite of having school holidays in any
                  month.</li>
                <li>This website only accept credit or debit card payment.</li>
                <li>For cash payment, the fee must be given directly to the bus driver.</li>
                <li>User will receive warning if payment of each month past its due.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="flex flex-col w-full mt-4">
        @foreach ($busService as $busServiceData)
          @if ($busServiceData->id === $payment[0]->bus_service_id)
            <h1 class="text-xl font-bold">
              {{ $busServiceData->student->first_name }} {{ $busServiceData->student->last_name }} Payment Record
            </h1>
          @endif
        @endforeach
        <p class="text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
                  @elseif ($busServiceData->status === 'Paid')
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
                <td class="px-4 py-3 text-right">
                  <input type="checkbox">
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="flex items-center mt-4 gap-x-4">
        <a class="px-8 py-2 text-sm text-white bg-blue-600 rounded w-max focus:outline-none hover:bg-blue-700"
          href="#">
          Pay Fee
        </a>
        <a class="px-8 py-2 text-sm text-gray-800 border border-gray-300 rounded focus:outline-none hover:bg-gray-100"
          href="{{ route('payment.view') }}">
          Cancel
        </a>
      </div>
    </div>
  </div>
</x-app-layout>
