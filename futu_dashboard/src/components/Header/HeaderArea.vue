<script setup lang="ts">
import { useSidebarStore } from '@/stores/sidebar'
import DarkModeSwitcher from './DarkModeSwitcher.vue'
import DropdownMessage from './DropdownMessage.vue'
import DropdownNotification from './DropdownNotification.vue'
import DropdownUser from './DropdownUser.vue'

const { isSidebarOpen, toggleSidebar } = useSidebarStore()
</script>

<template>
  <header
    class="sticky top-0 z-999 flex w-full bg-white drop-shadow-1 dark:bg-boxdark dark:drop-shadow-none"
  >
    <div
      class="flex flex-grow items-center justify-between xl:justify-end lg:justify-end py-4 px-4 shadow-2 md:px-6 2xl:px-11"
    >
      <div class="flex items-center gap-2 sm:gap-4 lg:hidden">
        <!-- Hamburger Toggle BTN -->
        <button
          class="z-99999 block rounded-sm border border-stroke bg-white p-1.5 shadow-sm dark:border-strokedark dark:bg-boxdark lg:hidden"
          @click="
            () => {
              console.log('Toggling Sidebar')
              toggleSidebar()
            }
          "
        >
          <span class="relative block h-5.5 w-5.5 cursor-pointer">
            <span class="du-block absolute right-0 h-full w-full">
              <span
                class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-[0] duration-200 ease-in-out dark:bg-white"
                :class="{ '!w-full delay-300': !isSidebarOpen }"
              ></span>
              <span
                class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-150 duration-200 ease-in-out dark:bg-white"
                :class="{ '!w-full delay-400': !isSidebarOpen }"
              ></span>
              <span
                class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-200 duration-200 ease-in-out dark:bg-white"
                :class="{ '!w-full delay-500': !isSidebarOpen }"
              ></span>
            </span>
            <span class="du-block absolute right-0 h-full w-full rotate-45">
              <span
                class="absolute left-2.5 top-0 block h-full w-0.5 rounded-sm bg-black delay-300 duration-200 ease-in-out dark:bg-white"
                :class="{ '!h-0 delay-[0]': !isSidebarOpen }"
              ></span>
              <span
                class="delay-400 absolute left-0 top-2.5 block h-0.5 w-full rounded-sm bg-black duration-200 ease-in-out dark:bg-white"
                :class="{ '!h-0 dealy-200': !isSidebarOpen }"
              ></span>
            </span>
          </span>
        </button>
        <!-- Hamburger Toggle BTN -->
        <router-link class="block flex-shrink-0 lg:hidden xl:hidden" to="/">
          <!-- <img src="@/assets/images/logo/logo-icon.svg" alt="Logo" /> -->
          <svg
            class="w-10 h-10 hidden lg:block md:hidden sm:hidden"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            version="1.1"
            x="0px"
            y="0px"
            viewBox="0 0 64 64"
            enable-background="new 0 0 64 64"
            xml:space="preserve"
          >
            <defs>
              <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color: #008cff; stop-opacity: 1" />
                <stop offset="100%" style="stop-color: #ff00bf; stop-opacity: 1" />
              </linearGradient>
            </defs>
            <g>
              <g>
                <path
                  fill="url(#grad1)"
                  d="M56.846,32.677c0.297-1.558,0.447-3.11,0.447-4.632C57.293,14.097,45.946,2.75,32,2.75S6.707,14.097,6.707,28.044    c0,1.521,0.15,3.074,0.446,4.632c-4.362,3.076-6.746,6.932-6.746,10.97C0.407,53.518,14.284,61.25,32,61.25    s31.593-7.732,31.593-17.604C63.593,39.608,61.209,35.752,56.846,32.677z M32,57.25c-14.957,0-27.593-6.229-27.593-13.604    c0-2.959,2.148-5.929,6.05-8.363c0.733-0.458,1.09-1.335,0.884-2.174c-0.421-1.71-0.634-3.414-0.634-5.065    C10.707,16.303,20.259,6.75,32,6.75s21.293,9.553,21.293,21.294c0,1.652-0.214,3.356-0.635,5.064    c-0.206,0.84,0.15,1.718,0.884,2.175c3.902,2.434,6.051,5.404,6.051,8.363C59.593,51.021,46.957,57.25,32,57.25z"
                ></path>
                <path
                  fill="url(#grad1)"
                  d="M47.358,42.849c0-2.175-1.189-5.191-3.097-7.965c0.437-0.841,0.663-1.73,0.663-2.63c0-4.8-6.16-9.172-12.925-9.172    s-12.925,4.372-12.925,9.172c0,0.899,0.227,1.79,0.664,2.63c-1.908,2.773-3.098,5.79-3.098,7.965c0,0.469-0.041,0.956-0.08,1.449    c-0.153,1.92-0.363,4.549,1.595,6.669c2.203,2.386,6.473,3.449,13.844,3.449c7.37,0,11.64-1.063,13.843-3.449    c1.958-2.121,1.749-4.75,1.596-6.67C47.399,43.804,47.358,43.317,47.358,42.849z M42.904,48.253    C41.993,49.24,39.361,50.416,32,50.416c-7.362,0-9.994-1.176-10.905-2.163c-0.732-0.793-0.685-1.899-0.546-3.638    c0.046-0.574,0.093-1.167,0.093-1.767c0-1.349,1.069-4.076,3.113-6.677c0.592-0.753,0.567-1.819-0.059-2.543    c-0.412-0.477-0.621-0.939-0.621-1.375c0-2.035,3.832-5.172,8.925-5.172s8.925,3.138,8.925,5.172c0,0.436-0.209,0.898-0.62,1.375    c-0.625,0.724-0.65,1.791-0.06,2.543c2.044,2.602,3.113,5.329,3.113,6.678c0,0.6,0.047,1.192,0.093,1.766    C43.59,46.354,43.638,47.459,42.904,48.253z"
                ></path>
                <path
                  fill="url(#grad1)"
                  d="M16.111,23.435c-3.225,0-3.225,5,0,5S19.336,23.435,16.111,23.435z"
                ></path>
                <path
                  fill="url(#grad1)"
                  d="M47.889,23.435c-3.225,0-3.225,5,0,5S51.113,23.435,47.889,23.435z"
                ></path>
              </g>
            </g>
          </svg>
        </router-link>
      </div>
      <!-- <div class="hidden sm:block">
        <form action="https://formbold.com/s/unique_form_id" method="POST">
          <div class="relative">
            <button class="absolute top-1/2 left-0 -translate-y-1/2">
              <svg
                class="fill-body hover:fill-primary dark:fill-bodydark dark:hover:fill-primary"
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M9.16666 3.33332C5.945 3.33332 3.33332 5.945 3.33332 9.16666C3.33332 12.3883 5.945 15 9.16666 15C12.3883 15 15 12.3883 15 9.16666C15 5.945 12.3883 3.33332 9.16666 3.33332ZM1.66666 9.16666C1.66666 5.02452 5.02452 1.66666 9.16666 1.66666C13.3088 1.66666 16.6667 5.02452 16.6667 9.16666C16.6667 13.3088 13.3088 16.6667 9.16666 16.6667C5.02452 16.6667 1.66666 13.3088 1.66666 9.16666Z"
                  fill=""
                />
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M13.2857 13.2857C13.6112 12.9603 14.1388 12.9603 14.4642 13.2857L18.0892 16.9107C18.4147 17.2362 18.4147 17.7638 18.0892 18.0892C17.7638 18.4147 17.2362 18.4147 16.9107 18.0892L13.2857 14.4642C12.9603 14.1388 12.9603 13.6112 13.2857 13.2857Z"
                  fill=""
                />
              </svg>
            </button>

            <input
              type="text"
              placeholder="Type to search..."
              class="w-full xl:w-125 bg-transparent pr-4 pl-9 focus:outline-none"
            />
          </div>
        </form>
      </div> -->

      <div class="flex items-center gap-3 2xsm:gap-7">
        <ul class="flex items-center gap-2 2xsm:gap-4">
          <li>
            <!-- Dark Mode Toggler -->
            <DarkModeSwitcher />
            <!-- Dark Mode Toggler -->
          </li>

          <!-- Notification Menu Area -->
          <!-- <DropdownNotification /> -->
          <!-- Notification Menu Area -->

          <!-- Chat Notification Area -->
          <!-- <DropdownMessage /> -->
          <!-- Chat Notification Area -->
        </ul>

        <!-- User Area -->
        <DropdownUser />
        <!-- User Area -->
      </div>
    </div>
  </header>
</template>
