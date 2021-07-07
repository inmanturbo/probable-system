@foreach($menus as $menu)
    @if(($loop->index + $loop->parent->index) === config('menus.max_nav_menus'))
        @php break; @endphp
    @endif
    <x-navbar-menu-group :active="requestPathIs($menu->uri) || requestPathIs($menu->authChildren->pluck('uri')->toArray())">
        <x-slot name="header">
            <a href="{{ $menu->uri }}" target="{{ $menu->target }}" >{{ $menu->name }}</a>
        </x-slot>

        @forelse($menu->authChildren as $item)
            @if($loop->index === config('menus.max_hotlinks'))
                @php break; @endphp
            @endif
            @if($item->authChildren()->exists())

            <x-jet-dropdown align="left" width="60">
                <x-slot name="trigger">
                    <button class="flex flex-row items-center outline-none focus:outline-none">
                        <!-- Menu Icon -->
                            <span class="mx-2 text-xs">{{ $item->name}}</span>

                    <span>
                        <!-- arrow toggle -->
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path x-cloak x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                            <path x-cloak x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </button>
                </x-slot>

                <x-slot name="content">
                    <div class="w-60">
                        @foreach($item->authChildren as $dropdownItem)
                            <x-jet-dropdown-link href="{{ $dropdownItem->uri }}">
                                {{ $dropdownItem->name }}
                            </x-jet-dropdown-link>
                        @endforeach
                    </div>
                </x-slot>
            </x-jet-dropdown>

            @else
                <x-navbar-menu-item>
                    <x-navbar-item-link href="{{ $item->uri }}" :target="$menu->target" :active="requestPathIs($item->uri)">
                        <li class="list-none nav-box">
                            {!! $item->icon->art !!}
                        </li>
                    </x-navbar-item-link>
                </x-navbar-menu-item>
            @endif
        @empty
            <p>&nbsp;</p>
        @endforelse
    </x-navbar-menu-group>
@endforeach
