@props(['active'=>false])
<a {{$attributes}} class="{{$active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md hover:bg-gray-700 px-3 py-2 text-sm font-medium text-white" aria-current="{{ $active ? 'page':false}}">{{$slot}}</a>
