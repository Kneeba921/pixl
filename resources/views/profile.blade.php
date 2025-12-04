<x-layout title="PIXL | Profile">
    <!-- Navigation -->
    @include('partials.navigation', ['showPostButton' => true])

    <!-- Content -->
    <main class="-mx-4 flex grow flex-col gap-4 overflow-y-auto px-4 py-4">
        <a href="/feed" class="group flex items-baseline gap-1.5">
            <span>back</span>
        </a>
        <!-- Profile header -->
        <header>
            <img src="/images/cover.png" alt="" />
            <div class="-mt-10 flex flex-wrap items-end justify-between gap-4 md:-mt-16">
                <div class="flex items-end gap-4">
                    <img src="/images/adrian.png" alt="Avatar for Adrian" class="size-20 object-cover md:size-32" />
                    <div class="flex flex-col text-sm md:gap-1">
                        <p class="text-lg md:text-xl">_adrian</p>
                        <p class="text-pixl-light/60 text-sm">@tudssss</p>
                    </div>
                </div>
                <a href="#"
                    class="bg-pixl-dark/50 hover:bg-pixl-dark/60 active:bg-pixl-dark/75 border-pixl/50 hover:border-pixl/60 active:border-pixl/75 text-pixl border px-2 py-1 text-sm">
                    Edit Profile
                </a>
            </div>
            <div class="[&_a]:text-pixl mt-8 [&_a]:hover:underline">
                <p>I design <a href="#">@Laracasts</a> so hit me up whenever :]</p>
            </div>
            <dl class="mt-6 flex gap-6">
                <div class="flex gap-1.5">
                    <dd>100</dd>
                    <dt class="text-pixl-light/60">Following</dt>
                </div>
                <div class="flex gap-1.5">
                    <dd>2190</dd>
                    <dt class="text-pixl-light/60">Followers</dt>
                </div>
            </dl>
        </header>

        <!-- Navigation/tabs -->
        <div class="mt-6 h-full">
            <nav class="overflow-x-auto [scrollbar-width:none]">
                <ul class="flex min-w-max justify-end gap-8 text-sm">
                    <li><a href="#">Posts</a></li>
                    <li>
                        <a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Replies</a>
                    </li>
                    <li>
                        <a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Highlights</a>
                    </li>
                    <li>
                        <a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Inspiration Streams</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Feed -->
        <ol class="border-pixl-light/10 border-t pt-4">
            <!-- Feed item -->
            @foreach ($feedItems as $item)
                @include('partials.feed-item', compact('item'))
            @endforeach
            <!-- More replies... -->
        </ol>
        </div>
        </li>
        <!-- More feed items... -->
        </ol>

        <footer class="mt-30 ml-14">
            <p class="text-center">That's all, folks!</p>
            <hr class="border-pixl-light/10 my-4" />
            <!-- White noise -->
            <div class="h-20 bg-[url(/images/white-noise.gif)]"></div>
        </footer>
    </main>

    <!-- Sidebar -->
    @include('partials.aside')
</x-layout>
