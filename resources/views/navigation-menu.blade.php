<nav x-data="{ open: false }" 
     class="fixed top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 border border-l-0 border-gray-300 shadow-2xl rounded-e-lg px-5 py-3 z-50">
  <div class="py-5">
    <div class="group cursor-pointer ">
      <img src="{{ url('/') }}/assets/img/dash-logo.png" alt="Image 1" class="w-10 h-8 pb-1 opacity-100 group-hover:hidden transition-all duration-500">
      <img src="{{ url('/') }}/assets/img/logo.png" alt="Image 2" class="w-10 h-8 pb-1 hidden group-hover:block transition-all duration-500">
      <p class="text-white font-semibold pb-5 pt-1">
        OCM
      </p>
    </div>
    <hr>
  </div>
    
  <div class="grid grid-cols-1 items-center space-y-12 py-3">



    <a href="{{ route('dashboard') }}" class="group relative flex flex-col items-center text-white hover:text-sky-300 transition-transform duration-200 transform hover:scale-125">
      <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M8.12602 14C8.57006 15.7252 10.1362 17 12 17C13.8638 17 15.4299 15.7252 15.874 14M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      <span class="absolute left-full ml-2 px-3 py-1 rounded-md bg-white text-gray-800 text-xs opacity-0 group-hover:opacity-100 pointer-events-none whitespace-nowrap">
        Dashboard
      </span>
    </a>

    <a href="{{ route('campaigns') }}" class="group relative flex flex-col items-center text-white hover:text-sky-300 transition-transform duration-200 transform hover:scale-125">
      <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M22 7.99992V11.9999M10.25 5.49991H6.8C5.11984 5.49991 4.27976 5.49991 3.63803 5.82689C3.07354 6.11451 2.6146 6.57345 2.32698 7.13794C2 7.77968 2 8.61976 2 10.2999L2 11.4999C2 12.4318 2 12.8977 2.15224 13.2653C2.35523 13.7553 2.74458 14.1447 3.23463 14.3477C3.60218 14.4999 4.06812 14.4999 5 14.4999V18.7499C5 18.9821 5 19.0982 5.00963 19.1959C5.10316 20.1455 5.85441 20.8968 6.80397 20.9903C6.90175 20.9999 7.01783 20.9999 7.25 20.9999C7.48217 20.9999 7.59826 20.9999 7.69604 20.9903C8.64559 20.8968 9.39685 20.1455 9.49037 19.1959C9.5 19.0982 9.5 18.9821 9.5 18.7499V14.4999H10.25C12.0164 14.4999 14.1772 15.4468 15.8443 16.3556C16.8168 16.8857 17.3031 17.1508 17.6216 17.1118C17.9169 17.0756 18.1402 16.943 18.3133 16.701C18.5 16.4401 18.5 15.9179 18.5 14.8736V5.1262C18.5 4.08191 18.5 3.55976 18.3133 3.2988C18.1402 3.05681 17.9169 2.92421 17.6216 2.88804C17.3031 2.84903 16.8168 3.11411 15.8443 3.64427C14.1772 4.55302 12.0164 5.49991 10.25 5.49991Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span class="absolute left-full ml-2 px-3 py-1 rounded-md bg-white text-gray-800 text-xs opacity-0 group-hover:opacity-100 pointer-events-none whitespace-nowrap">
        Campaigns
      </span>
    </a>

    <!-- Nav Item: Offers -->
    <a href="{{ route('offers') }}" class="group relative flex flex-col items-center text-white hover:text-sky-300 transition-transform duration-200 transform hover:scale-125">
      <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M9 9H9.01M15 15H15.01M16 8L8 16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM9.5 9C9.5 9.27614 9.27614 9.5 9 9.5C8.72386 9.5 8.5 9.27614 8.5 9C8.5 8.72386 8.72386 8.5 9 8.5C9.27614 8.5 9.5 8.72386 9.5 9ZM15.5 15C15.5 15.2761 15.2761 15.5 15 15.5C14.7239 15.5 14.5 15.2761 14.5 15C14.5 14.7239 14.7239 14.5 15 14.5C15.2761 14.5 15.5 14.7239 15.5 15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span class="absolute left-full ml-2 px-3 py-1 rounded-md bg-white text-gray-800 text-xs opacity-0 group-hover:opacity-100 pointer-events-none whitespace-nowrap">
        Offers
      </span>
    </a>

    <!-- Nav Item: Properties -->
    <a href="{{ route('properties') }}" class="group relative flex flex-col items-center text-white hover:text-sky-300 transition-transform duration-200 transform hover:scale-125">
      <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M7.5 11H4.6C4.03995 11 3.75992 11 3.54601 11.109C3.35785 11.2049 3.20487 11.3578 3.10899 11.546C3 11.7599 3 12.0399 3 12.6V21M16.5 11H19.4C19.9601 11 20.2401 11 20.454 11.109C20.6422 11.2049 20.7951 11.3578 20.891 11.546C21 11.7599 21 12.0399 21 12.6V21M16.5 21V6.2C16.5 5.0799 16.5 4.51984 16.282 4.09202C16.0903 3.71569 15.7843 3.40973 15.408 3.21799C14.9802 3 14.4201 3 13.3 3H10.7C9.57989 3 9.01984 3 8.59202 3.21799C8.21569 3.40973 7.90973 3.71569 7.71799 4.09202C7.5 4.51984 7.5 5.0799 7.5 6.2V21M22 21H2M11 7H13M11 11H13M11 15H13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span class="absolute left-full ml-2 px-3 py-1 rounded-md bg-white text-gray-800 text-xs opacity-0 group-hover:opacity-100 pointer-events-none whitespace-nowrap">
        Properties
      </span>
    </a>

    <!-- <a href="" class="group relative flex flex-col items-center text-white hover:text-sky-300 transition-transform duration-200 transform hover:scale-125">
      <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M18 15.8369C19.4559 16.5683 20.7041 17.742 21.6152 19.2096C21.7956 19.5003 21.8858 19.6456 21.917 19.8468C21.9804 20.2558 21.7008 20.7585 21.3199 20.9204C21.1325 21 20.9216 21 20.5 21M16 11.5322C17.4817 10.7959 18.5 9.26686 18.5 7.5C18.5 5.73314 17.4817 4.20411 16 3.46776M14 7.5C14 9.98528 11.9852 12 9.49996 12C7.01468 12 4.99996 9.98528 4.99996 7.5C4.99996 5.01472 7.01468 3 9.49996 3C11.9852 3 14 5.01472 14 7.5ZM2.55919 18.9383C4.1535 16.5446 6.66933 15 9.49996 15C12.3306 15 14.8464 16.5446 16.4407 18.9383C16.79 19.4628 16.9646 19.725 16.9445 20.0599C16.9289 20.3207 16.7579 20.64 16.5495 20.7976C16.2819 21 15.9138 21 15.1776 21H3.82232C3.08613 21 2.71804 21 2.4504 20.7976C2.24201 20.64 2.07105 20.3207 2.05539 20.0599C2.03529 19.725 2.20992 19.4628 2.55919 18.9383Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span class="absolute left-full ml-2 px-3 py-1 rounded-md bg-white text-gray-800 text-xs opacity-0 group-hover:opacity-100 pointer-events-none whitespace-nowrap">
        Users
      </span>
    </a> -->

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="group relative flex justify-center items-center text-white hover:text-sky-300 transition-transform duration-200 transform hover:scale-125 ml-2">
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16 17L21 12M21 12L16 7M21 12H9M9 3H7.8C6.11984 3 5.27976 3 4.63803 3.32698C4.07354 3.6146 3.6146 4.07354 3.32698 4.63803C3 5.27976 3 6.11984 3 7.8V16.2C3 17.8802 3 18.7202 3.32698 19.362C3.6146 19.9265 4.07354 20.3854 4.63803 20.673C5.27976 21 6.11984 21 7.8 21H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="absolute left-full ml-2 px-3 py-1 rounded-md bg-white text-gray-800 text-xs opacity-0 group-hover:opacity-100 pointer-events-none whitespace-nowrap">
              Logout
          </span>
      </button>
    </form>


  </div>
</nav>
