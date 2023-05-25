{{--
    Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
    See the LICENCE file in the repository root for full licence text.
--}}
@php
    $currentRoute = app('route-section')->getCurrent();

    $currentSection = $currentRoute['section'];
    $currentAction = $currentRoute['action'];

    $currentUser = Auth::user();

    $titleTree = [];

    if (isset($titleOverride)) {
        $titleTree[] = $titleOverride;
    } else {
        if (isset($titlePrepend)) {
            $titleTree[] = $titlePrepend;
        }

        $titleTree[] = page_title();
    }

    $title = '';
    foreach ($titleTree as $i => $titlePart) {
        $title .= e($titlePart);

        if ($i + 1 === count($titleTree)) {
            // Titles ending with phrase containing "osu!" like "osu!store" don't need the suffix.
            if (strpos($titlePart, 'osu!') === false) {
                $title .= ' | osu!';
            }
        } else {
            $title .= ' · ';
        }
    }

    $currentHue = $currentHue ?? section_to_hue_map($currentSection);

    $navLinks ??= nav_links();
    $currentLocaleMeta ??= current_locale_meta();
@endphp
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="{{ $contentLocale ?? $currentLocaleMeta->html() }}">
    <head>
        @include("layout.metadata")
        <title>{!! $title !!}</title>
    </head>

    <body
        class="
            osu-layout
            osu-layout--body
            t-section
            action-{{ $currentAction }}
            {{ $bodyAdditionalClasses ?? '' }}
        "
    >
        <style>
            :root {
                --base-hue: {{ $currentHue }};
                --base-hue-deg: {{ $currentHue }}deg;
            }
        </style>
        <div id="overlay" class="blackout blackout--overlay" style="display: none;"></div>
        <div class="blackout js-blackout" data-visibility="hidden"></div>

        @if ($currentUser !== null && $currentUser->isRestricted())
            @include('objects._notification_banner', [
                'type' => 'alert',
                'title' => osu_trans('users.restricted_banner.title'),
                'message' => osu_trans('users.restricted_banner.message', [
                    'link' => tag(
                        'a',
                        ['href' => config('osu.urls.user.restriction')],
                        osu_trans('users.restricted_banner.message_link'),
                    ),
                ]),
            ])
        @endif

        @if (!isset($blank))
            @include("layout.header")

            <div
                class="osu-page osu-page--notification-banners js-notification-banners js-sync-height--reference"
                data-sync-height-target="notification-banners"
            >
                @stack('notification_banners')
            </div>
        @endif
        <div class="osu-layout__section osu-layout__section--full js-content {{ $currentSection }}_{{ $currentAction }}">
            @yield('content')
        </div>
        @if (!isset($blank))
            @include("layout.gallery_window")
            @include("layout.footer")
        @endif

        <div
            class="fixed-bar
                js-fixed-element
                js-fixed-bottom-bar
                js-sticky-footer--fixed-bar"
        >
            <div
                class="js-permanent-fixed-footer
                    js-sync-height--reference"
                data-sync-height-target="permanent-fixed-footer"
            >
                @yield('permanent-fixed-footer')

                    <div class="development-deploy-footer">
                        You are viewing an experimental osu!web deploy with osu!(lazer) scores incorporated in the mix.
                        <br>You can choose to return to the <a href="https://osu.ppy.sh" class="js-link-main-host development-deploy-footer__link">normal version</a>.
                    </div>
            </div>
        </div>

        <div id="main-player" class="audio-player-floating" data-turbolinks-permanent>
            <div class="js-audio--main"></div>
            <div class="js-sync-height--target" data-sync-height-id="permanent-fixed-footer"></div>
        </div>
        {{--
            Components:
            - lib/utils/estimate-min-lines.ts (main)
            - less/bem/estimate-min-lines.less (styling)
            - views/master.blade.php (placeholder)
        --}}
        <div id="estimate-min-lines" class="estimate-min-lines" data-turbolinks-permanent>
            <div class="estimate-min-lines__content js-estimate-min-lines"></div>
        </div>
        @include("layout._global_variables")
        @include('layout._loading_overlay')
        @include('layout.popup-container')

        <script id="json-route-section" type="application/json">
            {!! json_encode($currentRoute) !!}
        </script>

        @yield("script")
    </body>
</html>
