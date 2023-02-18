<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{ asset('output.css')}}" />
    <title>CVP Tool</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap"
        rel="stylesheet"
    />
</head>
<body class="xl:mx-20 lg:mx-16 sm:mx-10 mx-8">
<!-- Navbar -->
<nav class="mt-6 flex items-center justify-between">
    <!-- Left section: Logo -->

    <div>
        <img
            src="./assets/Logo.svg"
            alt="Inside Out Group Logo"
            class="sm:w-32 sm:h-11 w-20 h-8"
        />
    </div>

    <!-- Right Section -->
    <div class="flex items-center">
        <button
            class="bg-white border-2 border-dark-green mr-4 uppercase px-4 py-1 text-[18px] font-normal hover:bg-dark-green hover:text-white transition duration-500"
        >
            let's talk
        </button>
        <!-- Hamburger Menu -->
        <button class="my-auto mx-auto">
            <i class="fa-solid fa-bars text-dark-green"></i>
        </button>
    </div>
</nav>

<!-- Value Proposition Tool -->
<section>
    <!-- HEADING -->
    <div class="mt-20">
        <h1 class="text-center lg:text-5xl md:text-4xl sm:text-xl text-xl">Value Proposition Tool</h1>
        <p class="text-night-rider mt-2 sm:mx-11  text-justify lg:text-[22px] md:text-[18px] text-[16px]">
            Welcome to the CVP (Compelling Value Proposition) tool. This will
            identify the most powerful territory that you can move forward into
            developing a creative expression which can become the lynchpin of all
            your marketing. You can try this yourself, but alternately your work
            here creates a great brief for a copywriter.
        </p>
    </div>

    <!-- STEP 1 -->
    @if(!session()->has('step_one_data') || session()->has('step_two_data'))
    <div class="mt-20 mb-16 md:mx-11">
        <!-- HEADING -->
        <div class="flex items-center justify-center">
            <div class="h-[2px] w-16 bg-dark-green"></div>
            <h2 class="mx-2 lg:text-3xl sm:text-2xl text-lg">Step 1</h2>
            <div class="h-[2px] w-16 bg-dark-green"></div>
        </div>
        <!-- SUBHEADING -->
        <div>
            <h3 class="text-center mb-2 mt-4 lg:text-2xl sm:text-xl text-base">LIST BENEFITS AND CATEGORISE</h3>
            <p class="text-night-rider mt-1 text-justify  lg:text-[22px] md:text-[18px] text-[16px]">
                First add the benefits you offer your customers. Don’t use wishful
                thinking, the only benefits that really matter are the ones you can
                prove! Then, categorise each benefit – select between emotional (how
                it makes your customer feel), economic (either in terms of what it
                costs or, better, the economic value it delivers) and
                functional/technical (product advantages).
            </p>
        </div>
        <!-- TABLE -->
        <form action="{{ route('store-benefits') }}" method="get">
        <div class="flex items-center justify-center mt-10">


            <table
                style="
            width: 95%;
              border-collapse: separate;
              border-spacing: 0 1.5em;
            "
                class="items-center"
                id="list-benefits"
            >
                <!-- HEADING -->

                <tr  id="0">
                    <th class="xl:w-1/2 w-2/5 text-dark-green uppercase font-normal xl:text-lg lg:text-sm md:text-xs text-[14px]">
                        BENEFIT (50 CHARACTERS MAX)
                    </th>
                    <th class="xl:w-1/6 w-1/5 text-dark-green uppercase font-normal xl:text-lg lg:text-sm md:text-xs text-[14px]">
                        EMOTIONAL
                    </th>
                    <th class="xl:w-1/6 w-1/5 text-dark-green uppercase font-normal xl:text-lg lg:text-sm md:text-xs text-[14px]">
                        ECONOMIC
                    </th>
                    <th class="xl:w-1/6 w-1/5 text-dark-green uppercase font-normal xl:text-lg lg:text-sm md:text-xs text-[14px]">
                        FUNCTIONAL /TECHNICAL
                    </th>
                </tr>

                <!-- ROW 1 -->
                <tr class="deletable-row" id="1">
                    <td>
                        <div class="flex items-center justify-center">
                            <button class="mr-2 text-red btn-r" id="btn-r1"><i class="fa-solid fa-circle-xmark"></i></button>
                            <input name="benefit[0]" type="text" class="text-black xl:text-sm sm:text-xs text-[14px] leading-6 tracking-normal border-[1px] border-dark-grey bg-azure md:px-2 px-1 xl:w-[440px] lg:w-[300px] md:w-[200px] w-[100px] h-[46px] text-center flex items-center justify-center focus:outline-none">
                        </div>
                    </td>
                    <td>
                        <label class="flex items-center justify-center">
                            <input name="type[0]"
                                type="radio"
                                value="emotional"
                            />
                            <span></span>
                        </label>
                    </td>
                    <td>
                        <label class="flex items-center justify-center">
                            <input name="type[0]" type="radio"  value="economic" />
                            <span></span>
                        </label>
                    </td>
                    <td>
                        <label class="flex items-center justify-center">
                            <input name="type[0]"
                                type="radio"
                                value="functional"
                            />
                            <span></span>
                        </label>
                    </td>
                </tr>

            </table>

        </div>
        <!-- BUTTONS -->
        <div class="flex items-center justify-center mt-6">
            <div>
                <button type="button"
                    class="sm:text-base text-xs my-auto mx-auto text-white hover:text-dark-green bg-dark-green hover:bg-white sm:px-4 px-2 py-2 border-2 border-dark-green transition duration-500 sm:mr-4"
                    id="create-list"
                >
                    <i class="fa-solid fa-plus mr-2"></i>ADD MORE BENEFITS
                </button>
                <button type="submit"
                    class="sm:text-base text-xs my-auto mx-auto text-white bg-light-green border-2 border-light-green sm:px-4 px-2 py-2"
                >
                    SUBMIT
                </button>
            </div>
        </div>

        </form>
    </div>
    @endif
    <!-- HORIZONTAL LINE SECTION DIVIDER -->
    <div class="w-full h-[1px] bg-grey"></div>

    @if(session()->has('step_one_data') && !session()->has('step_two_data'))
    <!-- STEP 2 -->
    <div  class="mt-20 mb-16 md:mx-11">
        <!-- HEADING -->
        <div class="flex items-center justify-center">
            <div class="h-[2px] w-16 bg-dark-green"></div>
            <h2  class="mx-2 lg:text-3xl sm:text-2xl text-lg">Step 2</h2>
            <div class="h-[2px] w-16 bg-dark-green"></div>
        </div>
        <!-- SUBHEADING -->
        <div>
            <h3 class="text-center mt-4 mb-2">ASCRIBE DIFFERENTIATION SCORE</h3>
            <p class="text-night-rider mt-1 text-justify  lg:text-[22px] md:text-[18px] text-[16px]">
                Now you’re ready to start taking differentiation into account. So
                you simply add a score to each of your benefits, 1 to 5 where 1 is
                universal – everybody has it, and 5 is unique to you. (And you
                better be able to prove that!). Of course, 5s are the most powerful
                benefits, but they’re also really rare. You’ll be starting to see
                useful patterns emerging.
            </p>
        </div>
        <!-- TABLE -->
        <form action="{{ route('store-benefits-ratings') }}" method="post">
        @csrf
        <div class="flex items-center justify-center">
            <table style="width: 95%; border-collapse: separate; border-spacing: 0 2em" class="items-center text-center">
                <!-- HEADING -->
                <tr>
                    <th  class="w-1/3 text-dark-green uppercase font-normal xl:text-lg lg:text-sm md:text-xs text-[14px]">
                        EMOTIONAL BENEFITS
                    </th>
                    <th  class="w-1/3 text-dark-green uppercase font-normal xl:text-lg lg:text-sm md:text-xs text-[14px]">
                        ECONOMIC BENEFITS
                    </th>
                    <th  class="w-1/3 text-dark-green uppercase font-normal xl:text-lg lg:text-sm md:text-xs text-[14px]">
                        FUNCTIONAL BENEFITS
                    </th>
                </tr>
                <!-- ROW 1 -->
                @php
                    $step_one_data      = session()->get('step_one_data');
                    $formatted_data     = $step_one_data['formatted_data'];
                    $max_data_key       = $step_one_data['max_data_key'];
                @endphp

                @foreach($formatted_data[$max_data_key] as $key => $value)
                <tr>
                    <td>
                        @isset($formatted_data['emotional'][$key])
                        <div class="flex items-center justify-center">
                            <div class="text-black xl:text-sm sm:text-xs text-[14px]">
                                <p>{{ @$formatted_data['emotional'][$key] }}</p>
                                <div class="flex items-center justify-center mt-3">
                                    <input type="hidden" name="emotional['benefit'][{{ $key }}]" value="{{ @$formatted_data['emotional'][$key] }}" />
                                    <input type="text" onkeyup="if(value<1) value=1;if(value>5) value=5;" name="emotional['rating'][{{ $key }}]" required
                                        class="text-black text-center placeholder:text-center leading-6 tracking-normal border-[1px] border-dark-grey bg-azure w-[110px] h-[46px] flex items-center justify-center px-2 focus:outline-none"
                                        placeholder="1-5"
                                    />
                                </div>
                            </div>
                        </div>
                        @endisset
                    </td>

                    <td>
                        @isset($formatted_data['economic'][$key])
                        <div class="flex items-center justify-center">
                            <div class="text-black xl:text-sm sm:text-xs text-[14px] sm:mt-0  mt-[83px]">
                                <p class="sm:mb-0 mb-[20px]">{{ @$formatted_data['economic'][$key] }}</p>
                                <div class="flex items-center justify-center xl:mt-8 lg:mt-7 md:mt-10">
                                    <input type="hidden" name="economic['benefit'][{{ $key }}]" value="{{ @$formatted_data['economic'][$key] }}" />
                                    <input type="text" onkeyup="if(value<1) value=1;if(value>5) value=5;" name="economic['rating'][{{ $key }}]" required
                                        class="text-black text-center placeholder:text-center text-[20px] leading-6 tracking-normal border-[1px] border-dark-grey bg-azure w-[110px] h-[46px] flex items-center justify-center px-2 focus:outline-none"
                                        placeholder="1-5"
                                    />
                                </div>
                            </div>
                        </div>
                        @endisset
                    </td>

                    <td>
                        @isset($formatted_data['functional'][$key])
                        <div class="flex items-center justify-center">
                            <div class="text-black xl:text-sm sm:text-xs text-[14px] sm:mt-0  mt-[83px]">
                                <p class="sm:mb-0 mb-[20px]">{{ @$formatted_data['functional'][$key] }}</p>
                                <div class="flex items-center justify-center xl:mt-8 lg:mt-7 md:mt-10">
                                    <input type="hidden" name="functional['benefit'][{{ $key }}]" value="{{ @$formatted_data['functional'][$key] }}" />
                                    <input type="text" onkeyup="if(value<1) value=1;if(value>5) value=5;" name="functional['rating'][{{ $key }}]" required
                                        class="text-black text-center placeholder:text-center text-[20px] leading-6 tracking-normal border-[1px] border-dark-grey bg-azure w-[110px] h-[46px] flex items-center justify-center px-2 focus:outline-none"
                                        placeholder="1-5"
                                    />
                                </div>
                            </div>
                        </div>
                        @endisset
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <!-- BUTTON -->
        <div class="flex items-center justify-center mt-6">
            <button type="submit"
                class="sm:px-4 px-2 py-2 sm:text-base text-xs my-auto mx-auto text-white bg-light-green border-2 border-light-green"
            >
                SUBMIT
            </button>
        </div>
        </form>
    </div>
    @endif

    <!-- HORIZONTAL LINE SECTION DIVIDER -->
    <div class="w-full h-[1px] bg-grey"></div>

    <!-- STEP 3 -->
    @if(session()->has('step_two_data') && session()->has('step_one_data'))
    <div  class="mt-20 mb-16 md:mx-11">
        <!-- HEADING -->
        <div class="flex items-center justify-center">
            <div class="h-[2px] w-16 bg-dark-green"></div>
            <h2  class="mx-2 lg:text-3xl sm:text-2xl text-lg">Step 3</h2>
            <div class="h-[2px] w-16 bg-dark-green"></div>
        </div>
        <!-- SUBHEADING -->
        <div>
            <h3 class="text-center mt-4 mb-2">
                KEY DIFFERENTIATED BENEFITS (RANKED)
            </h3>
            <p class="text-night-rider mt-1 text-justify  lg:text-[22px] md:text-[18px] text-[16px]">
                The benefits you should feature in your marketing are the ones with
                the highest differentiation score, and emotional benefits are the
                most powerful of all as they’re the ones that stick in peoples’
                minds. Below the pyramid are the most important benefits you’ve
                identified. Focusing on these, now try to create a simple value
                statement. See below the download button for tips about this.
            </p>
        </div>

        <!-- TRIANGLE -->
        <div class="flex items-center justify-center mt-12">
            <img src="./assets/Triangle.png" alt="benefit ranking graph" width="500px" class="mb-10" />
        </div>

        <!-- TABLE -->
        <div class="flex items-center justify-center">
            <table
                class="w-full items-center text-center"
            >
                <!-- HEADING -->
                <tr>
                    <th class="text-white uppercase font-normal bg-red border-[1px] border-white h-14 xl:text-sm sm:text-xs text-[14px]">
                        EMOTIONAL BENEFITS
                    </th>
                    <th class="text-white uppercase font-normal bg-yellow border-[1px] border-white h-14 xl:text-sm sm:text-xs text-[14px]">
                        ECONOMIC BENEFITS
                    </th>
                    <th class="text-white uppercase font-normal bg-blue border-[1px] border-white h-14 xl:text-sm sm:text-xs text-[14px]">
                        FUNCTIONAL BENEFITS
                    </th>
                </tr>

                <!-- ROW 1 -->
                <tr>
                    <td>
                        <div class="flex items-center justify-center border-[1px] border-white lg:h-14 md:h-20 h-28 bg-red bg-opacity-10 xl:text-sm sm:text-xs text-[14px]">
                            <p>Connecting People</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center justify-center border-[1px] border-white lg:h-14 md:h-20 h-28 bg-yellow bg-opacity-10 xl:text-sm sm:text-xs text-[14px]">
                            <p>We are SMALL</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center justify-center border-[1px] border-white lg:h-14 md:h-20 h-28 bg-blue bg-opacity-10 xl:text-sm sm:text-xs text-[14px]">
                            <p>We are BIG</p>
                        </div>
                    </td>
                </tr>

                <!-- ROW 2 -->
                <tr>
                    <td>
                        <div class="flex items-center justify-center border-[1px] border-white lg:h-14 md:h-20 h-28 bg-red bg-opacity-10 xl:text-sm sm:text-xs text-[14px]">
                            <p>The Happiest Place On Earth</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center justify-center border-[1px] border-white lg:h-14 md:h-20 h-28 bg-yellow bg-opacity-10 xl:text-sm sm:text-xs text-[14px]">
                            <p>Pleasing people over the World</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center justify-center border-[1px] border-white lg:h-14 md:h-20 h-28 bg-blue bg-opacity-10 xl:text-sm sm:text-xs text-[14px]">
                            <p>The Best or Nothing</p>
                        </div>
                    </td>
                </tr>

                <!-- ROW 3 -->
                <tr>
                    <td class="w-1/3">
                        <div class="px-4 flex items-center justify-center border-[1px] border-white lg:h-14 md:h-20 h-28 bg-red bg-opacity-10 xl:text-sm sm:text-xs text-[14px]">
                            <p>Quick professional carpet cleaning at a fair price</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center justify-center border-[1px] border-white lg:h-14 md:h-20 h-28 bg-yellow bg-opacity-10 xl:text-sm sm:text-xs text-[14px]">
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center justify-center border-[1px] border-white lg:h-14 md:h-20 h-28 bg-blue bg-opacity-10 xl:text-sm sm:text-xs text-[14px]">
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- BUTTONS -->
        <div class="flex items-center justify-center mt-16 gap-4">
            <div>
                <button
                    class="sm:px-4 px-2 py-2 sm:text-base text-xs my-auto mx-auto text-white bg-dark-grey hover:bg-black border-2 border-dark-grey hover:border-black"
                >
                    START OVER
                </button>
                <button
                    class="sm:inline hidden sm:px-4 px-2 py-2 sm:text-base text-xs my-auto lg:mx-6 sm:mx-1 mx-0 ml-6 text-white bg-light-green border-2 border-light-green"
                >
                    SUBMIT
                </button>
                <button
                    class="sm:inline hidden sm:px-4 px-2 py-2 sm:text-base text-xs my-auto mx-auto text-white hover:text-dark-green bg-dark-green hover:bg-white border-2 border-dark-green transition duration-500"
                >
                    <i class="fa-solid fa-download mr-2"></i>DOWNLOAD
                </button>
            </div>
        </div>
        <!-- BUTTON ALIGNMENT FOR SMALL SCREENS -->
        <div class="flex items-center justify-center mt-4">
            <div>
                <button
                    class="inline sm:hidden sm:px-4 px-2 py-2 sm:text-base text-xs my-auto lg:mx-6 sm:mx-1 mx-0 text-white bg-light-green border-2 border-light-green"
                >
                    SUBMIT
                </button>
                <button
                    class="inline sm:hidden sm:px-4 px-2 py-2 sm:text-base text-xs my-auto mx-auto text-white hover:text-dark-green bg-dark-green hover:bg-white border-2 border-dark-green transition duration-500"
                >
                    <i class="fa-solid fa-download mr-2"></i>DOWNLOAD
                </button>
            </div>
        </div>
    </div>
    @endif
</section>
</body>
<script src="{{ asset('src/script.js') }}"></script>
</html>
