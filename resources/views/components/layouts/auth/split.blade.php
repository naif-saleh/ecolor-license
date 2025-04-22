<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
            <div class="bg-muted relative hidden h-full flex-col p-10 text-white lg:flex dark:border-e dark:border-neutral-800">
                <div class="absolute inset-0 bg-neutral-900"></div>
                {{-- <a href="{{ route('home') }}" class="relative z-20 flex items-center text-lg font-medium" wire:navigate>
                    <span class="flex h-10 w-10 items-center justify-center rounded-md">
                        <x-app-logo-icon class="me-2 h-7 fill-current text-white" />
                    </span>
                    {{ config('app.name', 'Ecolor') }}

                </a> --}}



                <div class="">
                    <div class="relative z-20 mt-55 h-full w-full flex flex-col items-center justify-center text-center">
                        <img src="{{ asset('images/ECOLOR-LOGO.svg') }}" alt="Auth Illustration" class="h-auto max-w-120" />
                        <h1 x-data="{
                            startingAnimation: { opacity: 0, scale: 4 },
                            endingAnimation: { opacity: 1, scale: 1, stagger: 0.07, duration: 1, ease: 'expo.out' },
                            addCNDScript: true,
                            animateText() {
                                $el.classList.remove('invisible');
                                gsap.fromTo($el.children, this.startingAnimation, this.endingAnimation);
                            },
                            splitCharactersIntoSpans(element) {
                                text = element.innerHTML;
                                modifiedHTML = [];
                                for (var i = 0; i < text.length; i++) {
                                    attributes = '';
                                    if(text[i].trim()){ attributes = 'class=\'inline-block\''; }
                                    modifiedHTML.push('<span ' + attributes + '>' + text[i] + '</span>');
                                }
                                element.innerHTML = modifiedHTML.join('');
                            },
                            addScriptToHead(url) {
                                script = document.createElement('script');
                                script.src = url;
                                document.head.appendChild(script);
                            }
                        }"
                        x-init="
                            splitCharactersIntoSpans($el);
                            if(addCNDScript){
                                addScriptToHead('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js');
                            }
                            gsapInterval = setInterval(function(){
                                if(typeof gsap !== 'undefined'){
                                    animateText();
                                    clearInterval(gsapInterval);
                                }
                            }, 5);
                        "
                        class="invisible block text-3xl font-bold custom-font"
                        >
                        Wellcome In Ecolor Licens
                        </h1>
                    </div>
                </div>
            </div>

            <div class="w-full lg:p-8">
                <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                    <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                        <span class="flex h-9 w-9 items-center justify-center rounded-md">
                            <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                        </span>

                        <span class="sr-only">{{ config('app.name', 'Ecolor') }}</span>
                    </a>
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
