<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        @media print {
            * {
                color-adjust: exact !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
</head>
<body class="xl:mx-20 lg:mx-16 sm:mx-10 mx-8">

    <!-- STEP 3 -->
    {{--    @if(session()->has('step_two_data') && session()->has('step_one_data'))--}}
    <div  class="mt-20 mb-16 md:mx-11" id="step_3">
        <div class="pdf-form">
            <!-- TRIANGLE -->
            <div style="justify-content: center;text-align: center; align-items: center; display: flex; margin-top: 3rem;"
                class="flex items-center justify-center mt-12">
                <img src="./assets/Triangle.png" alt="benefit ranking graph" width="500px" class="mb-10" />
            </div>

            <!-- TABLE -->
            <div class="flex items-center justify-center">
                <table
                    style="border-collapse: collapse;
                    width: 100%;
                    text-align: center;
                    ">
                    <!-- HEADING -->
                    <tr style="text-align: center;">
                        <th style="text-transform: uppercase;
                        color: rgb(255 255 255);
                        font-weight: 400;
                        background-color: rgb(240 68 114);
                        border-color: rgb(255 255 255);
                        border-width: 1px;
                        height: 3.5rem;
                        ">
                            EMOTIONAL BENEFITS
                        </th>
                        <th style="text-transform: uppercase;
                        color: rgb(255 255 255);
                        font-weight: 400;
                        background-color: rgb(255 170 10);
                        border-color: rgb(255 255 255);
                        border-width: 1px;
                        height: 3.5rem;
                        ">
                            ECONOMIC BENEFITS
                        </th>
                        <th style="text-transform: uppercase;
                        color: rgb(255 255 255);
                        font-weight: 400;
                        background-color: rgb(0 147 255);
                        border-color: rgb(255 255 255);
                        border-width: 1px;
                        height: 3.5rem;
                        ">
                            FUNCTIONAL BENEFITS
                        </th>
                    </tr>
                    @php
                        $session_data_two   = session()->get('step_two_data');
                        $formatted_data_two = @$session_data_two['formatted_data'];
                        $max_data_key       = @$session_data_two['max_data_key'];
                    @endphp
                    @isset($formatted_data_two[$max_data_key])
                        @foreach($formatted_data_two[$max_data_key]['benefit'] as $key => $value)

                            <!-- ROW 1 -->
                            <tr>
                                <td>
                                    @isset($formatted_data_two['emotional']['benefit'][$key])
                                        @if($formatted_data_two['emotional']['rating'][$key] > 2)
                                            <div style="background-color: rgb(240 68 114 /.1); text-align: center; height: 3rem; margin: 0 0 0 0; padding: 0.01mm 0 0 0;
                                            border-color: rgb(255 255 255 / 1);border-width: 1px;justify-content: center; align-items: center; display: flex;
                                            ">
                                                <p>{{ $formatted_data_two['emotional']['benefit'][$key] }}</p>
                                            </div>
                                        @endif
                                    @endisset
                                </td>
                                <td>
                                    {{--                        @dd($formatted_data_two['economic']['benefit'])--}}
                                    @isset($formatted_data_two['economic']['benefit'][$key])
                                        @if($formatted_data_two['economic']['rating'][$key] > 2)
                                            <div style="background-color: rgb(255 170 10 /.1); text-align: center; height: 3rem; margin: 0 0 0 0; padding: 0.01mm 0 0 0;
                                            border-color: rgb(255 255 255 / 1);border-width: 1px;justify-content: center;align-items: center;display: flex;
                                            "
                                                class="flex items-center justify-center border-[1px] border-white lg:h-14 md:h-20 h-28 bg-yellow bg-opacity-10 xl:text-sm sm:text-xs text-[14px]">
                                                <p>{{ $formatted_data_two['economic']['benefit'][$key] }}</p>
                                            </div>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @isset($formatted_data_two['functional']['benefit'][$key])
                                        @if($formatted_data_two['functional']['rating'][$key] > 2)
                                            <div style="background-color: rgb(0 147 255 /.1); text-align: center; height: 3rem; margin: 0 0 0 0; padding: 0.01mm 0 0 0;
                                            border-color: rgb(255 255 255 / 1);border-width: 1px;justify-content: center; align-items: center;display: flex;
                                            "
                                                class="flex items-center justify-center border-[1px] border-white lg:h-14 md:h-20 h-28 bg-blue bg-opacity-10 xl:text-sm sm:text-xs text-[14px]">
                                                <p>{{ $formatted_data_two['functional']['benefit'][$key] }}</p>
                                            </div>
                                        @endif
                                    @endisset
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </table>
            </div>
        </div>
    </div>
</section>
</body>
</html>
