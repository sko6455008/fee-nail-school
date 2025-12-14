<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="relative min-h-screen text-text-main selection:bg-rose-gold/30">
        
        <!-- Background Particles -->
        <div id="particles-container"></div>

        <!-- Floating Header -->
        <header class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent py-4">
            <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
                <a href="#top" class="font-script text-2xl md:text-3xl text-text-main cursor-pointer no-underline" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
                    Fee
                </a>
                <nav class="hidden md:flex gap-6 text-sm font-medium tracking-wider text-text-sub">
                    <a href="#features" class="hover:text-rose-gold transition-colors">アカデミー紹介</a>
                    <a href="#skills" class="hover:text-rose-gold transition-colors">学べる技術</a>
                    <a href="#courses" class="hover:text-rose-gold transition-colors">コース内容</a>
                    <a href="#future" class="hover:text-rose-gold transition-colors">卒業後</a>
                    <a href="#steps" class="hover:text-rose-gold transition-colors">入校手順</a>
                    <a href="#access" class="hover:text-rose-gold transition-colors">アクセス</a>
                    <a href="#faq" class="hover:text-rose-gold transition-colors">よくある質問</a>
                </nav>
                <a href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" id="header-contact-btn" class="hidden md:flex px-6 py-2 rounded-full text-sm transition-all shadow-md hover:shadow-lg bg-white/80 text-text-main items-center justify-center">
                    無料LINE相談
                </a>
                <!-- Mobile Hamburger Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 text-text-main hover:text-rose-gold transition-colors">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden fixed top-0 left-0 w-full h-screen bg-white/95 backdrop-blur-md z-40 transform translate-x-full transition-transform duration-300">
                <div class="flex flex-col h-full">
                    <div class="flex justify-between items-center p-4 border-b border-gray-200">
                        <span class="font-script text-2xl text-text-main">Fee</span>
                        <button id="mobile-menu-close" class="p-2 text-text-main hover:text-rose-gold transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                    <nav class="flex flex-col flex-1 p-4 space-y-4">
                        <a href="#features" class="mobile-menu-link text-lg font-medium text-text-main hover:text-rose-gold transition-colors py-2 border-b border-gray-100">アカデミー紹介</a>
                        <a href="#skills" class="mobile-menu-link text-lg font-medium text-text-main hover:text-rose-gold transition-colors py-2 border-b border-gray-100">学べる技術</a>
                        <a href="#courses" class="mobile-menu-link text-lg font-medium text-text-main hover:text-rose-gold transition-colors py-2 border-b border-gray-100">コース内容</a>
                        <a href="#future" class="mobile-menu-link text-lg font-medium text-text-main hover:text-rose-gold transition-colors py-2 border-b border-gray-100">卒業後</a>
                        <a href="#steps" class="mobile-menu-link text-lg font-medium text-text-main hover:text-rose-gold transition-colors py-2 border-b border-gray-100">入校手順</a>
                        <a href="#access" class="mobile-menu-link text-lg font-medium text-text-main hover:text-rose-gold transition-colors py-2 border-b border-gray-100">アクセス</a>
                        <a href="#faq" class="mobile-menu-link text-lg font-medium text-text-main hover:text-rose-gold transition-colors py-2 border-b border-gray-100">よくある質問</a>
                        <a href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" class="mt-auto bg-rose-gold text-white text-center py-3 rounded-full font-medium hover:bg-rose-gold-dark transition-colors">
                            無料LINE相談
                        </a>
                    </nav>
                </div>
            </div>
        </header>

        <main class="relative z-10">
            
            <!-- Hero -->
            <section id="top" class="relative h-screen w-full flex items-center justify-center overflow-hidden">
                <div class="absolute inset-0 z-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top.webp" alt="Pink Glitter Nail Art" class="w-full h-full object-cover object-center" />
                    <div class="absolute inset-0 bg-white/20 backdrop-blur-[1px]"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-white/10"></div>
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-30"></div>
                </div>

                <div class="relative z-10 text-center px-4 max-w-4xl mx-auto mt-10"> 
                    <h1 class="font-serif text-5xl md:text-7xl lg:text-8xl text-text-main mb-4 tracking-tighter gold-text-outline drop-shadow-lg">
                        <span class="block font-script text-9xl md:text-9xl lg:text-[12rem] xl:text-[14rem] text-white mb-2 hero-fee-shadow">Fee</span>
                    </h1>

                    <p class="text-xl md:text-2xl text-text-main font-japanese font-medium tracking-widest mb-10 text-shadow-sm bg-white/30 inline-block px-6 py-2 rounded-lg backdrop-blur-sm">
                        最短3ヶ月で<br class="md:hidden"/>プロのネイリストへ
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <a href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" class="relative overflow-hidden transition-all duration-300 transform hover:-translate-y-1 rounded-full font-serif tracking-wider py-4 px-8 shadow-lg hover:shadow-rose-200/50 flex items-center justify-center group bg-rose-gold text-white hover:bg-rose-gold-dark">
                            <span class="absolute inset-0 -translate-x-full group-hover:animate-shimmer bg-gradient-to-r from-transparent via-white/20 to-transparent"></span>
                            <span class="relative z-10 flex items-center gap-2">
                                無料LINE相談する
                            </span>
                        </a>
                        <a href="#courses" class="relative overflow-hidden transition-all duration-300 transform hover:-translate-y-1 rounded-full font-serif tracking-wider py-4 px-8 shadow-lg hover:shadow-rose-200/50 flex items-center justify-center group bg-white text-text-main border border-rose-gold/30 hover:bg-champagne-pink">
                            <span class="relative z-10 flex items-center gap-2">
                                コース詳細を見る
                            </span>
                        </a>
                    </div>
                </div>

                <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce cursor-pointer">
                     <a href="#top">
                        <i data-lucide="chevron-down" class="w-8 h-8 text-white drop-shadow-md opacity-90"></i>
                     </a>
                </div>
            </section>

            <!-- Banner -->
            <div class="w-full py-4 px-4 md:px-8 bg-white/50">
                <div class="max-w-7xl mx-auto">
                    <p class="text-sm md:text-lg font-bold tracking-wider text-center mb-4">
                        ＼ 今なら入学金 <span class="text-2xl md:text-3xl font-serif mx-1">0</span> 円キャンペーン実施中！ ／
                    </p>
                    <a href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" class="relative overflow-hidden group cursor-pointer transform transition-transform hover:scale-[1.01] flex justify-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner.webp" alt="Banner" class="w-[90%] md:w-[70%] lg:w-[50%] h-auto object-cover" />
                    </a>
                </div>
            </div>

            <!-- Intro -->
            <section id="intro" class="relative py-20 md:py-32 px-4 md:px-8 z-10">
                <div class="max-w-6xl mx-auto">
                    <div class="flex flex-col md:flex-row items-center gap-12">
                        <div class="w-[90%] md:w-[70%] lg:w-[50%] relative">
                            <div class="absolute -top-4 -left-4 w-full h-full border-2 border-dusty-rose rounded-tl-[4rem] rounded-br-[4rem] z-0"></div>
                            <div class="relative z-10 rounded-tl-[4rem] rounded-br-[4rem] overflow-hidden shadow-xl aspect-[4/5] md:aspect-square">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nail1.webp" alt="Professional Nail Artist" class="w-full h-full object-cover" />
                            </div>
                            <div class="absolute -bottom-6 -right-6 glass-panel px-6 py-4 rounded-xl shadow-lg z-20 animate-float">
                                <p class="font-script text-3xl text-rose-gold">Professional</p>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 space-y-6">
                            <h2 class="text-3xl md:text-4xl font-serif text-text-main leading-tight">
                                プロのネイリストを目指すなら<br/>
                                Fee Nail Academy
                            </h2>
                            <div class="w-16 h-1 bg-gradient-to-r from-rose-gold to-transparent"></div>
                            <p class="text-text-main leading-loose font-japanese text-justify">
                                サロン就職後すぐに活躍できる技術と接客力を習得できます。<br/>
                                モデル入客で実践敵に学び、トレンドを意識した提案力も養成します。<br/>
                                初心者にやさしいサロンワーク特化型カリキュラムで、系列サロンへ就職も可能です。<br/><br/>
                                あなたの「好き」を、一生モノの「技術」に変えませんか？
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features -->
            <section id="features" class="relative py-20 md:py-32 px-4 md:px-8 z-10 bg-soft-gradient">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-16 relative">
                        <span class="block font-script text-3xl md:text-5xl text-dusty-rose mb-2 animate-float">Why Choose Us</span>
                        <h2 class="text-2xl md:text-4xl font-serif text-text-main tracking-widest relative inline-block">
                            <span class="relative z-10">アカデミー紹介</span>
                            <span class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-12 h-0.5 bg-rose-gold"></span>
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
                        <!-- Feature Cards -->
                        <div class="glass-panel p-8 rounded-2xl flex flex-col items-center text-center group transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <div class="w-16 h-16 bg-gradient-to-br from-champagne-pink to-white rounded-full flex items-center justify-center mb-6 shadow-inner group-hover:scale-110 transition-transform text-rose-gold">
                                <i data-lucide="sparkles" class="w-7 h-7"></i>
                            </div>
                            <h3 class="text-lg font-bold text-text-main mb-3">サロンワーク特化型</h3>
                            <p class="text-text-sub text-sm leading-relaxed">サロンワークで即使える実践的なネイル技術を丁寧な指導のもとで確実に習得できます。</p>
                        </div>
                        <div class="glass-panel p-8 rounded-2xl flex flex-col items-center text-center group transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <div class="w-16 h-16 bg-gradient-to-br from-champagne-pink to-white rounded-full flex items-center justify-center mb-6 shadow-inner group-hover:scale-110 transition-transform text-rose-gold">
                                <i data-lucide="users" class="w-7 h-7"></i>
                            </div>
                            <h3 class="text-lg font-bold text-text-main mb-3">少人数制の丁寧な指導</h3>
                            <p class="text-text-sub text-sm leading-relaxed">少人数制クラスだから一人じとりを丁寧に確認でき、講師が即座に細かいアドバイスとフィードバックを行えます。</p>
                        </div>
                        <div class="glass-panel p-8 rounded-2xl flex flex-col items-center text-center group transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <div class="w-16 h-16 bg-gradient-to-br from-champagne-pink to-white rounded-full flex items-center justify-center mb-6 shadow-inner group-hover:scale-110 transition-transform text-rose-gold">
                                <i data-lucide="briefcase" class="w-7 h-7"></i>
                            </div>
                            <h3 class="text-lg font-bold text-text-main mb-3">就職・開業サポート充実</h3>
                            <p class="text-text-sub text-sm leading-relaxed">サロン就職に向けて履歴書の書き方から面接対策、自宅サロン開業のノウハウまで。系列サロンへの就職パスもあります。</p>
                        </div>
                        <div class="glass-panel p-8 rounded-2xl flex flex-col items-center text-center group transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <div class="w-16 h-16 bg-gradient-to-br from-champagne-pink to-white rounded-full flex items-center justify-center mb-6 shadow-inner group-hover:scale-110 transition-transform text-rose-gold">
                                <i data-lucide="coins" class="w-7 h-7"></i>
                            </div>
                            <h3 class="text-lg font-bold text-text-main mb-3">他社と比べて授業料がお得</h3>
                            <p class="text-text-sub text-sm leading-relaxed">高品質な授業をリーズナブルに提供。夢への第一歩を金銭面でもサポートします。</p>
                        </div>
                        <div class="glass-panel p-8 rounded-2xl flex flex-col items-center text-center group transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <div class="w-16 h-16 bg-gradient-to-br from-champagne-pink to-white rounded-full flex items-center justify-center mb-6 shadow-inner group-hover:scale-110 transition-transform text-rose-gold">
                                <i data-lucide="heart" class="w-7 h-7"></i>
                            </div>
                            <h3 class="text-lg font-bold text-text-main mb-3">初心者に優しい</h3>
                            <p class="text-text-sub text-sm leading-relaxed">道具の名前から持ち方まで、ゼロから優しく教えます。不器用だと心配な方でも、必ず上達できるカリキュラムです。</p>
                        </div>
                        <div class="glass-panel p-8 rounded-2xl flex flex-col items-center text-center group transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <div class="w-16 h-16 bg-gradient-to-br from-champagne-pink to-white rounded-full flex items-center justify-center mb-6 shadow-inner group-hover:scale-110 transition-transform text-rose-gold">
                                <i data-lucide="trending-up" class="w-7 h-7"></i>
                            </div>
                            <h3 class="text-lg font-bold text-text-main mb-3">最新のトレンド技術</h3>
                            <p class="text-text-sub text-sm leading-relaxed">定番技術はもちろん、SNSで話題の最新アートやニュアンスデザインなど、今求められる技術が学べます。</p>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-rose-gold/20"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="bg-[#FAF8F7] px-4 text-sm text-text-sub font-serif italic tracking-widest">Training Gallery</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
                        <div class="group relative aspect-square overflow-hidden rounded-xl shadow-md cursor-pointer">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nail2.webp" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute inset-0 bg-rose-gold/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <i data-lucide="sparkles" class="text-white w-6 h-6 animate-spin-slow"></i>
                            </div>
                        </div>
                        <div class="group relative aspect-square overflow-hidden rounded-xl shadow-md cursor-pointer">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nail3.webp" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute inset-0 bg-rose-gold/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <i data-lucide="sparkles" class="text-white w-6 h-6 animate-spin-slow"></i>
                            </div>
                        </div>
                        <div class="group relative aspect-square overflow-hidden rounded-xl shadow-md cursor-pointer">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nail4.webp" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute inset-0 bg-rose-gold/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <i data-lucide="sparkles" class="text-white w-6 h-6 animate-spin-slow"></i>
                            </div>
                        </div>
                        <div class="group relative aspect-square overflow-hidden rounded-xl shadow-md cursor-pointer">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nail5.webp" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute inset-0 bg-rose-gold/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <i data-lucide="sparkles" class="text-white w-6 h-6 animate-spin-slow"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Skills -->
            <section id="skills" class="relative py-20 md:py-32 px-4 md:px-8 z-10">
                 <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-16 relative">
                        <span class="block font-script text-3xl md:text-5xl text-dusty-rose mb-2 animate-float">Skills You Learn</span>
                        <h2 class="text-2xl md:text-4xl font-serif text-text-main tracking-widest relative inline-block">
                            <span class="relative z-10">学べる技術</span>
                            <span class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-12 h-0.5 bg-rose-gold"></span>
                        </h2>
                    </div>

                    <div class="absolute top-1/2 left-0 w-64 h-64 bg-rose-gold/5 rounded-full blur-3xl -z-10"></div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Category 1 -->
                        <div class="bg-white/60 backdrop-blur-sm border border-white/80 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                            <h3 class="text-xl font-serif text-text-main mb-4 flex items-center gap-2 border-b border-rose-gold/30 pb-2">
                                <span class="text-rose-gold font-script text-2xl">01.</span> 基礎知識
                            </h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> 爪の構造</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> 病気トラブル</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> 衛生管理</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> 道具の名称</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> 技術理論</li>
                            </ul>
                        </div>
                        <!-- Category 2 -->
                        <div class="bg-white/60 backdrop-blur-sm border border-white/80 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                             <h3 class="text-xl font-serif text-text-main mb-4 flex items-center gap-2 border-b border-rose-gold/30 pb-2">
                                <span class="text-rose-gold font-script text-2xl">02.</span> ネイルケア
                            </h3>
                             <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> ファイリング</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> ハンドケア</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> フットケア</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> ウォーターケア</li>
                            </ul>
                        </div>
                        <!-- Category 3 -->
                        <div class="bg-white/60 backdrop-blur-sm border border-white/80 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                            <h3 class="text-xl font-serif text-text-main mb-4 flex items-center gap-2 border-b border-rose-gold/30 pb-2">
                                <span class="text-rose-gold font-script text-2xl">03.</span> マシーンケア
                            </h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> マシーンケア基礎</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> オフ</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> プレパレーション</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> フィルイン</li>
                            </ul>
                        </div>
                        <!-- Category 4 -->
                        <div class="bg-white/60 backdrop-blur-sm border border-white/80 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                             <h3 class="text-xl font-serif text-text-main mb-4 flex items-center gap-2 border-b border-rose-gold/30 pb-2">
                                <span class="text-rose-gold font-script text-2xl">04.</span> 長さ出し・補強
                            </h3>
                             <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> ジェル</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> チップ</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> アクリル技術</li>
                            </ul>
                        </div>
                        <!-- Category 5 -->
                        <div class="bg-white/60 backdrop-blur-sm border border-white/80 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                             <h3 class="text-xl font-serif text-text-main mb-4 flex items-center gap-2 border-b border-rose-gold/30 pb-2">
                                <span class="text-rose-gold font-script text-2xl">05.</span> ネイルアート
                            </h3>
                             <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> ワンカラー</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> ラメグラ</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> マグネット</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> トレンドデザイン</li>
                            </ul>
                        </div>
                        <!-- Category 6 -->
                        <div class="bg-white/60 backdrop-blur-sm border border-white/80 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                             <h3 class="text-xl font-serif text-text-main mb-4 flex items-center gap-2 border-b border-rose-gold/30 pb-2">
                                <span class="text-rose-gold font-script text-2xl">06.</span> サロンワーク技術
                            </h3>
                             <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> ヒアリング方法</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> メニュー提案の仕方</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> 施術中の声かけ</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> 手元の見せ方</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> 時間管理</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> 接客マナー</li>
                                <li class="flex items-center gap-2 text-text-sub text-sm"><i data-lucide="check-circle-2" class="w-4 h-4 text-rose-gold"></i> サロンワークのノウハウ</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mt-12 glass-panel p-6 rounded-xl text-center">
                        <h4 className="font-bold text-lg mb-2 text-text-main">＋ 開業サポート</h4>
                        <p className="text-text-sub">ネイル技術、場所・道具、手続き、集客、運営体制など、開業に必要なことも学べます。</p>
                    </div>
                </div>
            </section>

            <!-- Courses -->
            <section id="courses" class="relative py-20 md:py-32 px-4 md:px-8 z-10 bg-gradient-to-b from-white to-pink-50/50">
                 <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-16 relative">
                        <span class="block font-script text-3xl md:text-5xl text-dusty-rose mb-2 animate-float">Choose Your Path</span>
                        <h2 class="text-2xl md:text-4xl font-serif text-text-main tracking-widest relative inline-block">
                            <span class="relative z-10">コース内容</span>
                            <span class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-12 h-0.5 bg-rose-gold"></span>
                        </h2>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-8 justify-center items-stretch">
                        <!-- Course 1 -->
                        <div class="relative flex flex-col w-full lg:w-1/2 p-8 rounded-3xl transition-all duration-300 bg-white border border-gray-100 shadow-lg">
                            <div class="mb-6">
                                <div class="flex items-center gap-2 text-text-sub text-sm mb-2">
                                    <i data-lucide="clock" class="w-4 h-4"></i>
                                    <span>期間: 3ヶ月</span>
                                </div>
                                <h3 class="text-2xl md:text-3xl font-bold text-text-main mb-4 font-serif">3ヶ月即戦力コース</h3>
                                <p class="text-text-sub leading-relaxed border-b border-dashed border-gray-200 pb-4 mb-4">
                                    3ヶ月間で480時間分の授業を消化して頂く短期集中型のコースになります。強い意欲を持ち、最短距離でプロデビューを目指したい方におすすめです。
                                </p>
                                <div class="bg-white/50 rounded-lg p-3 mb-6 inline-block">
                                     <span class="text-xs text-text-sub block mb-1">こんな方におすすめ</span>
                                     <span class="font-bold text-rose-gold-dark">早く働きたい方 / 転職をお考えの方</span>
                                </div>
                            </div>
                            <ul class="space-y-4 mb-8 flex-grow">
                                <li class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-rose-gold/20 flex items-center justify-center text-rose-gold shrink-0"><i data-lucide="star" class="w-3 h-3 fill-current"></i></div>
                                    <span class="text-text-main">学習密度が高い</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-rose-gold/20 flex items-center justify-center text-rose-gold shrink-0"><i data-lucide="star" class="w-3 h-3 fill-current"></i></div>
                                    <span class="text-text-main">就職までのスピードが早い</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-rose-gold/20 flex items-center justify-center text-rose-gold shrink-0"><i data-lucide="star" class="w-3 h-3 fill-current"></i></div>
                                    <span class="text-text-main">サロンワーク特化</span>
                                </li>
                            </ul>
                            <div class="mt-auto pt-6 border-t border-gray-100 text-center">
                                <p class="text-3xl font-serif text-text-main mb-6">¥298,000 (税込)</p>
                                <a href="#steps" class="w-full relative overflow-hidden transition-all duration-300 transform hover:-translate-y-1 rounded-full font-serif tracking-wider py-4 px-8 shadow-lg hover:shadow-rose-200/50 flex items-center justify-center group bg-white text-text-main border border-rose-gold/30 hover:bg-champagne-pink">
                                    <span class="relative z-10 flex items-center gap-2">このコースについて相談する</span>
                                </a>
                            </div>
                        </div>

                        <!-- Course 2 (Featured) -->
                        <div class="relative flex flex-col w-full lg:w-1/2 p-8 rounded-3xl transition-all duration-300 bg-gradient-to-br from-white to-champagne-pink border-2 border-rose-gold/20 shadow-xl scale-[1.02] z-10">
                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-rose-gold text-white px-6 py-1 rounded-full text-sm font-bold shadow-md whitespace-nowrap">
                                人気No.1
                            </div>
                            <div class="mb-6">
                                <div class="flex items-center gap-2 text-text-sub text-sm mb-2">
                                    <i data-lucide="clock" class="w-4 h-4"></i>
                                    <span>期間: 9ヶ月</span>
                                </div>
                                <h3 class="text-2xl md:text-3xl font-bold text-text-main mb-4 font-serif">9ヶ月じっくりコース</h3>
                                <p class="text-text-sub leading-relaxed border-b border-dashed border-gray-200 pb-4 mb-4">
                                    9ヶ月間で480時間分の授業を消化して頂くじっくり習得型のコースになります。ゆとりある期間で技術を定着させ、仕事や生活と両立しながら、プロデビューを目指したい方におすすめです。
                                </p>
                                <div class="bg-white/50 rounded-lg p-3 mb-6 inline-block">
                                     <span class="text-xs text-text-sub block mb-1">こんな方におすすめ</span>
                                     <span class="font-bold text-rose-gold-dark">独立開業を目指す方 / 全ての技術を極めたい方</span>
                                </div>
                            </div>
                            <ul class="space-y-4 mb-8 flex-grow">
                                <li class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-rose-gold/20 flex items-center justify-center text-rose-gold shrink-0"><i data-lucide="star" class="w-3 h-3 fill-current"></i></div>
                                    <span class="text-text-main">無理ないペース</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-rose-gold/20 flex items-center justify-center text-rose-gold shrink-0"><i data-lucide="star" class="w-3 h-3 fill-current"></i></div>
                                    <span class="text-text-main">働きながら通いやすい</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-rose-gold/20 flex items-center justify-center text-rose-gold shrink-0"><i data-lucide="star" class="w-3 h-3 fill-current"></i></div>
                                    <span class="text-text-main">サロンワーク特化</span>
                                </li>
                            </ul>
                            <div class="mt-auto pt-6 border-t border-gray-100 text-center">
                                <p class="text-3xl font-serif text-text-main mb-6">¥580,000 (税込)</p>
                                <a href="#steps" class="w-full relative overflow-hidden transition-all duration-300 transform hover:-translate-y-1 rounded-full font-serif tracking-wider py-4 px-8 shadow-lg hover:shadow-rose-200/50 flex items-center justify-center group bg-rose-gold text-white hover:bg-rose-gold-dark">
                                    <span class="absolute inset-0 -translate-x-full group-hover:animate-shimmer bg-gradient-to-r from-transparent via-white/20 to-transparent"></span>
                                    <span class="relative z-10 flex items-center gap-2">このコースについて相談する</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-12 text-center">
                        <p class="text-sm text-text-sub">※分割払いも可能ですのでご相談ください。</p>
                        <p class="text-sm text-text-sub">※卒業後、1単位(4時間)5,000円(税込)で受講可能です。</p>
                    </div>
                </div>
            </section>

            <!-- Future -->
            <section id="future" class="relative py-20 md:py-32 px-4 md:px-8 z-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-16 relative">
                        <span class="block font-script text-3xl md:text-5xl text-dusty-rose mb-2 animate-float">After Graduation</span>
                        <h2 class="text-2xl md:text-4xl font-serif text-text-main tracking-widest relative inline-block">
                            <span class="relative z-10">卒業後</span>
                            <span class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-12 h-0.5 bg-rose-gold"></span>
                        </h2>
                    </div>

                    <div class="bg-white/80 backdrop-blur-md rounded-3xl p-8 md:p-12 shadow-xl border border-white">
                        <h3 class="text-2xl font-serif text-center mb-10 text-text-main">Fee Nail Academyを卒業すると...</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="text-center group">
                                <div class="w-full h-48 rounded-2xl overflow-hidden mb-6 shadow-md relative">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tool.webp" alt="Salon" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                    <div class="absolute inset-0 bg-rose-gold/10 group-hover:bg-transparent transition-colors"></div>
                                </div>
                                <h4 class="text-lg font-bold mb-2">人気サロンへ就職</h4>
                                <p class="text-sm text-text-sub">提携サロンや系列店への優先紹介が可能。即戦力として自信を持ってデビューできます。</p>
                            </div>
                             <div class="text-center group">
                                <div class="w-full h-48 rounded-2xl overflow-hidden mb-6 shadow-md relative">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tools.webp" alt="Home Salon" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                    <div class="absolute inset-0 bg-rose-gold/10 group-hover:bg-transparent transition-colors"></div>
                                </div>
                                <h4 class="text-lg font-bold mb-2">自宅サロン開業</h4>
                                <p class="text-sm text-text-sub">低コストで開業するノウハウを伝授。自分のペースで働くライフスタイルを実現します。</p>
                            </div>
                             <div class="text-center group">
                                <div class="w-full h-48 rounded-2xl overflow-hidden mb-6 shadow-md relative">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tips.webp" alt="Artist" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                    <div class="absolute inset-0 bg-rose-gold/10 group-hover:bg-transparent transition-colors"></div>
                                </div>
                                <h4 class="text-lg font-bold mb-2">フリーランスとして活躍</h4>
                                <p class="text-sm text-text-sub">シェアサロンを利用したり、出張ネイリストとして自由に働く道もサポートします。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Steps -->
            <section id="steps" class="relative py-20 md:py-32 px-4 md:px-8 z-10 bg-white">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-16 relative">
                        <span class="block font-script text-3xl md:text-5xl text-dusty-rose mb-2 animate-float">How to Join</span>
                        <h2 class="text-2xl md:text-4xl font-serif text-text-main tracking-widest relative inline-block">
                            <span class="relative z-10">入校手順</span>
                            <span class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-12 h-0.5 bg-rose-gold"></span>
                        </h2>
                    </div>

                    <div class="relative">
                        <!-- Connecting Line (Desktop) -->
                        <div class="hidden md:block absolute top-12 left-0 w-full h-0.5 bg-gray-100 -z-10"></div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                            <!-- Step 1 -->
                            <div class="flex flex-col items-center text-center group">
                                <div class="w-24 h-24 rounded-full bg-white border-4 border-champagne-pink flex items-center justify-center text-rose-gold mb-6 shadow-lg group-hover:border-rose-gold transition-colors relative">
                                    <span class="absolute -top-2 -right-2 w-8 h-8 bg-text-main text-white rounded-full flex items-center justify-center text-sm font-serif">1</span>
                                    <div class="transform group-hover:scale-110 transition-transform">
                                        <i data-lucide="mail" class="w-8 h-8"></i>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mb-2 text-text-main">お問い合わせ</h4>
                                <p class="text-sm text-text-sub">公式LINEからお気軽にご連絡ください。</p>
                            </div>
                            <!-- Step 2 -->
                            <div class="flex flex-col items-center text-center group">
                                <div class="w-24 h-24 rounded-full bg-white border-4 border-champagne-pink flex items-center justify-center text-rose-gold mb-6 shadow-lg group-hover:border-rose-gold transition-colors relative">
                                    <span class="absolute -top-2 -right-2 w-8 h-8 bg-text-main text-white rounded-full flex items-center justify-center text-sm font-serif">2</span>
                                    <div class="transform group-hover:scale-110 transition-transform">
                                        <i data-lucide="calendar-days" class="w-8 h-8"></i>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mb-2 text-text-main">無料LINE相談する</h4>
                                <p class="text-sm text-text-sub">スクールの雰囲気を見学し、コースの相談をします。</p>
                            </div>
                             <!-- Step 3 -->
                            <div class="flex flex-col items-center text-center group">
                                <div class="w-24 h-24 rounded-full bg-white border-4 border-champagne-pink flex items-center justify-center text-rose-gold mb-6 shadow-lg group-hover:border-rose-gold transition-colors relative">
                                    <span class="absolute -top-2 -right-2 w-8 h-8 bg-text-main text-white rounded-full flex items-center justify-center text-sm font-serif">3</span>
                                    <div class="transform group-hover:scale-110 transition-transform">
                                        <i data-lucide="file-signature" class="w-8 h-8"></i>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mb-2 text-text-main">入校手続き</h4>
                                <p class="text-sm text-text-sub">申し込み用紙への記入と、授業料のお支払い。</p>
                            </div>
                             <!-- Step 4 -->
                            <div class="flex flex-col items-center text-center group">
                                <div class="w-24 h-24 rounded-full bg-white border-4 border-champagne-pink flex items-center justify-center text-rose-gold mb-6 shadow-lg group-hover:border-rose-gold transition-colors relative">
                                    <span class="absolute -top-2 -right-2 w-8 h-8 bg-text-main text-white rounded-full flex items-center justify-center text-sm font-serif">4</span>
                                    <div class="transform group-hover:scale-110 transition-transform">
                                        <i data-lucide="school" class="w-8 h-8"></i>
                                    </div>
                                </div>
                                <h4 class="font-bold text-lg mb-2 text-text-main">レッスン開始</h4>
                                <p class="text-sm text-text-sub">教材を受け取り、いよいよネイリストへの第一歩！</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-16 text-center">
                        <div class="glass-panel p-8 max-w-2xl mx-auto rounded-3xl shadow-xl border-2 border-white/50">
                            <h3 class="text-2xl font-serif text-rose-gold-dark mb-4">First Step</h3>
                            <p class="mb-8">まずは無料カウンセリング・見学へお越しください。<br/>無理な勧誘は一切ございません。</p>
                            <a href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" class="w-full relative overflow-hidden transition-all duration-300 transform hover:-translate-y-1 rounded-full font-serif tracking-wider py-4 px-8 shadow-lg hover:shadow-rose-200/50 flex items-center justify-center group bg-rose-gold text-white hover:bg-rose-gold-dark">
                                <span class="absolute inset-0 -translate-x-full group-hover:animate-shimmer bg-gradient-to-r from-transparent via-white/20 to-transparent"></span>
                                <span class="relative z-10 flex items-center gap-2">無料カウンセリング・見学を予約する</span>
                            </a>
                            <p class="mt-4 text-xs text-text-sub">※公式LINE24時間受付中</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Access -->
            <section id="access" class="relative py-20 md:py-32 px-4 md:px-8 z-10">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-16 relative">
                        <span class="block font-script text-3xl md:text-5xl text-dusty-rose mb-2 animate-float">Location</span>
                        <h2 class="text-2xl md:text-4xl font-serif text-text-main tracking-widest relative inline-block">
                            <span class="relative z-10">アクセス</span>
                            <span class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-12 h-0.5 bg-rose-gold"></span>
                        </h2>
                    </div>

                    <div class="flex flex-col md:flex-row gap-8 bg-white rounded-3xl overflow-hidden shadow-lg border border-gray-100">
                        <div class="w-full md:w-1/2 min-h-[300px] bg-gray-200">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.656784611312!2d139.7083669762955!3d35.72999997257159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d5e4126f30f%3A0x7d6c57f7b5a1b0a!2z5rGg6KKL6aeF!5e0!3m2!1sja!2sjp!4v1700000000000!5m2!1sja!2sjp" 
                                width="100%" 
                                height="100%" 
                                style="border:0" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                            <h3 class="text-2xl font-serif text-text-main mb-6">Fee Nail Academy</h3>
                            <div class="space-y-6">
                                <div class="flex items-start gap-4">
                                    <i data-lucide="map-pin" class="w-6 h-6 text-rose-gold shrink-0 mt-1"></i>
                                    <div>
                                        <p class="font-bold mb-1">所在地</p>
                                        <p class="text-text-sub">〒171-0022<br/>東京都豊島区南池袋1-28-1<br/>池袋駅西口 徒歩3分</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <i data-lucide="clock" class="w-6 h-6 text-rose-gold shrink-0 mt-1"></i>
                                    <div>
                                        <p class="font-bold mb-1">営業時間</p>
                                        <p class="text-text-sub">平日：11:00 - 21:00<br/>土日祝：10:00 - 20:00<br/>定休日：無休</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <i data-lucide="phone" class="w-6 h-6 text-rose-gold shrink-0 mt-1"></i>
                                    <div>
                                        <p class="font-bold mb-1">お問い合わせ</p>
                                        <p class="text-text-sub font-serif text-lg">03-1234-5678</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FAQ -->
            <section id="faq" class="relative py-20 md:py-32 px-4 md:px-8 z-10 bg-gradient-to-t from-white to-pink-50/30">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-16 relative">
                        <span class="block font-script text-3xl md:text-5xl text-dusty-rose mb-2 animate-float">Q&A</span>
                        <h2 class="text-2xl md:text-4xl font-serif text-text-main tracking-widest relative inline-block">
                            <span class="relative z-10">よくある質問</span>
                            <span class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-12 h-0.5 bg-rose-gold"></span>
                        </h2>
                    </div>

                    <div class="max-w-3xl mx-auto space-y-4">
                        <!-- FAQ Item 1 -->
                        <div class="border border-rose-gold/20 rounded-2xl bg-white overflow-hidden transition-all duration-300 hover:shadow-md">
                            <button class="faq-button w-full flex items-center justify-between p-6 text-left focus:outline-none">
                                <span class="font-bold text-text-main pr-4">
                                    <span class="text-rose-gold font-serif mr-2">Q.</span>
                                    お支払いは分割は可能ですか？
                                </span>
                                <span class="text-rose-gold shrink-0 bg-champagne-pink rounded-full p-1">
                                    <i data-lucide="plus" class="faq-icon w-4 h-4"></i>
                                </span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden">
                                <div class="p-6 pt-0 text-text-sub text-sm leading-relaxed border-t border-dashed border-gray-100 mt-2 bg-gray-50/50">
                                    <span class="text-rose-gold font-serif mr-2 font-bold">A.</span>
                                    はい、分割でのお支払いも対応しています。例えば24分割なら月4,000円(税込)～お支払いも可能です。詳細はお問い合わせください。
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item 2 -->
                        <div class="border border-rose-gold/20 rounded-2xl bg-white overflow-hidden transition-all duration-300 hover:shadow-md">
                            <button class="faq-button w-full flex items-center justify-between p-6 text-left focus:outline-none">
                                <span class="font-bold text-text-main pr-4">
                                    <span class="text-rose-gold font-serif mr-2">Q.</span>
                                    追加料金はかかりますか？
                                </span>
                                <span class="text-rose-gold shrink-0 bg-champagne-pink rounded-full p-1">
                                    <i data-lucide="plus" class="faq-icon w-4 h-4"></i>
                                </span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden">
                                <div class="p-6 pt-0 text-text-sub text-sm leading-relaxed border-t border-dashed border-gray-100 mt-2 bg-gray-50/50">
                                    <span class="text-rose-gold font-serif mr-2 font-bold">A.</span>
                                    基本的なコース費用以外に追加料金はかかりません。ただしオプションコースを受講される場合と道具購入の場合は別途費用がかかります。
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item 3 -->
                        <div class="border border-rose-gold/20 rounded-2xl bg-white overflow-hidden transition-all duration-300 hover:shadow-md">
                            <button class="faq-button w-full flex items-center justify-between p-6 text-left focus:outline-none">
                                <span class="font-bold text-text-main pr-4">
                                    <span class="text-rose-gold font-serif mr-2">Q.</span>
                                    欠席するとどうなりますか？
                                </span>
                                <span class="text-rose-gold shrink-0 bg-champagne-pink rounded-full p-1">
                                    <i data-lucide="plus" class="faq-icon w-4 h-4"></i>
                                </span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden">
                                <div class="p-6 pt-0 text-text-sub text-sm leading-relaxed border-t border-dashed border-gray-100 mt-2 bg-gray-50/50">
                                    <span class="text-rose-gold font-serif mr-2 font-bold">A.</span>
                                    欠席された場合、振替授業の対応もしています。事前にご連絡頂ければ、別の日程で受講することも可能です。
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item 4 -->
                        <div class="border border-rose-gold/20 rounded-2xl bg-white overflow-hidden transition-all duration-300 hover:shadow-md">
                            <button class="faq-button w-full flex items-center justify-between p-6 text-left focus:outline-none">
                                <span class="font-bold text-text-main pr-4">
                                    <span class="text-rose-gold font-serif mr-2">Q.</span>
                                    全くの初心者ですが大丈夫ですか？
                                </span>
                                <span class="text-rose-gold shrink-0 bg-champagne-pink rounded-full p-1">
                                    <i data-lucide="plus" class="faq-icon w-4 h-4"></i>
                                </span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden">
                                <div class="p-6 pt-0 text-text-sub text-sm leading-relaxed border-t border-dashed border-gray-100 mt-2 bg-gray-50/50">
                                    <span class="text-rose-gold font-serif mr-2 font-bold">A.</span>
                                    はい、全くの初心者でも大丈夫です。基礎から丁寧に指導しますので、安心してご受講ください。
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item 5 -->
                        <div class="border border-rose-gold/20 rounded-2xl bg-white overflow-hidden transition-all duration-300 hover:shadow-md">
                            <button class="faq-button w-full flex items-center justify-between p-6 text-left focus:outline-none">
                                <span class="font-bold text-text-main pr-4">
                                    <span class="text-rose-gold font-serif mr-2">Q.</span>
                                    持っている道具を使っても大丈夫ですか？
                                </span>
                                <span class="text-rose-gold shrink-0 bg-champagne-pink rounded-full p-1">
                                    <i data-lucide="plus" class="faq-icon w-4 h-4"></i>
                                </span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden">
                                <div class="p-6 pt-0 text-text-sub text-sm leading-relaxed border-t border-dashed border-gray-100 mt-2 bg-gray-50/50">
                                    <span class="text-rose-gold font-serif mr-2 font-bold">A.</span>
                                    はい、ご自身でお持ちの道具を使用して頂いても問題ありません。ただし、授業で必要な道具については事前にご確認ください。
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item 6-->
                        <div class="border border-rose-gold/20 rounded-2xl bg-white overflow-hidden transition-all duration-300 hover:shadow-md">
                            <button class="faq-button w-full flex items-center justify-between p-6 text-left focus:outline-none">
                                <span class="font-bold text-text-main pr-4">
                                    <span class="text-rose-gold font-serif mr-2">Q.</span>
                                    道具の購入はできますか？
                                </span>
                                <span class="text-rose-gold shrink-0 bg-champagne-pink rounded-full p-1">
                                    <i data-lucide="plus" class="faq-icon w-4 h-4"></i>
                                </span>
                            </button>
                            <div class="faq-content max-h-0 opacity-0 overflow-hidden">
                                <div class="p-6 pt-0 text-text-sub text-sm leading-relaxed border-t border-dashed border-gray-100 mt-2 bg-gray-50/50">
                                    <span class="text-rose-gold font-serif mr-2 font-bold">A.</span>
                                    はい、アカデミーで推奨する道具の購入も可能です。詳細は入学時にご案内いたします。
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <!-- Footer -->
        <footer class="bg-text-main text-white pt-16 pb-8 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-rose-gold to-transparent opacity-50"></div>
            
            <div class="max-w-6xl mx-auto px-4 flex flex-col justify-between items-center gap-8 mb-12">
                <div class="text-center">
                    <h2 class="font-script text-5xl mb-2 text-rose-gold">Fee</h2>
                    <p class="text-sm text-gray-400 tracking-widest">Nail Academy</p>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8 text-center text-xs text-gray-400 font-sans">
                <div class="flex justify-center gap-6 mb-4">
                    <a href="#" class="hover:text-white transition-colors">プライバシーポリシー</a>
                    <a href="#" class="hover:text-white transition-colors">特定商取引法に基づく表記</a>
                    <a href="#" class="hover:text-white transition-colors">運営会社</a>
                </div>
                <p>&copy; <?php echo date('Y'); ?> Fee Nail Academy. All Rights Reserved.</p>
            </div>
        </footer>
        
        <!-- Sticky Bottom CTA for Mobile -->
        <div id="bottom-cta" class="md:hidden fixed bottom-0 left-0 w-full z-40 bg-white/90 backdrop-blur border-t border-rose-gold/20 p-4 transition-transform duration-300 translate-y-full">
            <a href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" class="block text-center w-full bg-rose-gold text-white py-3 rounded-full shadow-lg font-bold tracking-wider">
                無料LINE相談する
            </a>
        </div>

    </div>

<?php wp_footer(); ?>
</body>
</html>
