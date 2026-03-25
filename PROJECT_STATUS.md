# Akorn - Status Projektu

## Stack
- WordPress 6.9 + Bedrock (Composer)
- Sage 11 + Acorn 5 (Blade, View Composers)
- Tailwind CSS 4 + Vite 6
- ACF Pro
- Rank Math SEO (breadcrumby)

---

## Komponenty gotowe

### Blade Components
| Komponent | Plik | Opis |
|-----------|------|------|
| `<x-button>` | `components/button.blade.php` | Przycisk/link z wariantami (primary/secondary), rozmiarami (sm/md/lg), slotami na ikony (leftIcon/rightIcon) |
| `<x-alert>` | `components/alert.blade.php` | Alert z wariantami (success/caution/warning) |
| `<x-blog-posts>` | `components/blog-posts.blade.php` | Reużywalny blok postów z propsami (category, count, heading, label, description, exclude). Auto reading time. |
| `<x-icon.arrow-down>` | `components/icon/arrow-down.blade.php` | SVG strzałka w dół |
| `<x-icon.arrow-circle-right>` | `components/icon/arrow-circle-right.blade.php` | SVG strzałka w kole |
| `<x-icon.chevron-right>` | `components/icon/chevron-right.blade.php` | SVG chevron prawo |
| `<x-icon.chevron-up>` | `components/icon/chevron-up.blade.php` | SVG chevron góra |
| `<x-icon.diamond>` | `components/icon/diamond.blade.php` | SVG diament (timeline) |
| `<x-icon.document>` | `components/icon/document.blade.php` | SVG dokument |
| `<x-icon.hamburger>` | `components/icon/hamburger.blade.php` | SVG hamburger menu |
| `<x-icon.location>` | `components/icon/location.blade.php` | SVG lokalizacja |
| `<x-icon.mail>` | `components/icon/mail.blade.php` | SVG koperta |
| `<x-icon.minus-circle>` | `components/icon/minus-circle.blade.php` | SVG minus w kole |
| `<x-icon.phone>` | `components/icon/phone.blade.php` | SVG telefon |
| `<x-icon.plus-circle>` | `components/icon/plus-circle.blade.php` | SVG plus w kole |
| `<x-icon.support>` | `components/icon/support.blade.php` | SVG support |

### Sekcje (reużywalne)
| Sekcja | Plik | Typ | Opis |
|--------|------|-----|------|
| Header | `sections/header/` | Layout | Top bar, nav bar, mobile menu drawer |
| Footer | `sections/footer/index.blade.php` | Layout | 4 kolumny (logo+opis, dane formalne, kontakt, usługi), dolny pasek copyright |
| Hero | `sections/hero/index.blade.php` | ACF | Breadcrumby (Rank Math), tytuł, opis, CTA, obraz + panel statystyk hardcoded |
| Usługi | `sections/uslugi/index.blade.php` | ACF | Akordeon usług z CTA. Composer: `Uslugi.php` |
| Portfolio | `sections/portfolio/index.blade.php` | ACF | Rozwijane projekty z animacją zdjęcia. Composer: `Portfolio.php` |
| Jak działamy | `sections/jak-dzialamy/index.blade.php` | Hardcode | Timeline 4 kroków + CTA |
| Benefits | `sections/benefits/index.blade.php` | ACF | Karty z kolorami tła, reużywalne na stronach. Composer: `Benefits.php` |
| Opinie | `sections/opinie/index.blade.php` | ACF Options | Slider opinii, globalne dane. Composer: `Opinie.php` |
| CTA | `sections/cta/index.blade.php` | Hardcode | Banner CTA z logo, reużywalny |
| Newsletter | `sections/newsletter/index.blade.php` | Hardcode | Formularz email, tło w containerze |
| Kontakt | `sections/kontakt/index.blade.php` | Hardcode | Dane kontaktowe + formularz (front-end only) |

### View Composers
| Composer | Widoki | Dane |
|----------|--------|------|
| `App.php` | `*` (wszystkie) | `siteName` |
| `Hero.php` | `sections.hero.index` | `hero` (title, text, tagText, image url/alt) |
| `Uslugi.php` | `sections.uslugi.index` | `uslugi` (heading, description, ctaText, ctaLink, items[]) |
| `Portfolio.php` | `sections.portfolio.index` | `portfolio` (label, heading, items[] z image/description/link) |
| `Benefits.php` | `sections.benefits.index` | `benefits` (label, heading, items[] z icon/title/description/bgColor/bgImage) |
| `Opinie.php` | `sections.opinie.index` | `opinie` (heading, description, items[] z image/quote/author/videoUrl) — z ACF Options |
| `Post.php` | `partials.page-header`, `partials.content*` | `title`, `pagination` |
| `Comments.php` | `partials.comments` | `title`, `responses`, `previous`, `next`, `paginated`, `closed` |

### CSS Design Tokens
| Plik | Opis |
|------|------|
| `base/color.css` | Paleta: primary (100-500), blue (100-500), orange (100-500) |
| `base/typography.css` | Skala typografii: display-lg/md/sm/xs, text-xl/md/sm/xs + klasy wag |
| `components/menu.css` | Separator menu (.primary-menu li.menu-sep-before) |

### JS Moduły
| Moduł | Opis |
|-------|------|
| `components/mobile-menu.js` | Toggle mobile menu (drawer, overlay, escape, aria) |
| `components/accordion.js` | Akordeon (sekcja usługi) — jeden otwarty, animacja height |
| `components/portfolio.js` | Portfolio toggle — animacja width/opacity zdjęcia |
| `components/drag-scroll.js` | Drag-to-scroll na desktop (sekcja opinie) |
| `utils/domReady.js` | Utility: DOM ready handler |
| `bootstrap/assets.js` | Glob import images/fonts |

### ACF Field Groups
| Grupa | Pola | Lokalizacja |
|-------|------|-------------|
| Main-Hero | `hero-tiitle`, `hero-desc`, `hero-tag-text`, `hero-img` | Front page |
| Usługi | `uslugi_heading`, `uslugi_description`, `uslugi_cta_text`, `uslugi_cta_link`, `uslugi_items` (repeater) | Front page |
| Portfolio | `portfolio_label`, `portfolio_heading`, `portfolio_items` (repeater: title, description, image, link) | Front page |
| Benefits | `benefits_label`, `benefits_heading`, `benefits_items` (repeater: icon, title, description, bg_color, bg_image) | All pages |
| Opinie klientów | `opinie_heading`, `opinie_description`, `opinie_items` (repeater: image, quote, author, video_url) | ACF Options Page |

### ACF Options Pages
| Strona | Menu slug | Opis |
|--------|-----------|------|
| Opinie klientów | `opinie-klientow` | Globalne opinie — wyświetlane przez komponent na dowolnej stronie |

### Szablony stron
| Szablon | Status | Opis |
|---------|--------|------|
| `front-page.blade.php` | ✅ Gotowy | Hero, usługi, portfolio, jak działamy, benefits, opinie, CTA, blog, newsletter, kontakt |
| `page.blade.php` | ✅ Bazowy | Podstrona |
| `single.blade.php` | ✅ Bazowy | Single post |
| `index.blade.php` | ✅ Bazowy | Lista postów |
| `search.blade.php` | ✅ Bazowy | Wyniki wyszukiwania |
| `404.blade.php` | ✅ Bazowy | Strona 404 |

### Zasoby
| Zasób | Opis |
|-------|------|
| `images/logo.svg` | Białe logo "Akorn" (95x24) |
| `images/logoakorn.png` | Logo PNG |

---

## W trakcie / Do zrobienia
- [x] Przebudowa sekcji Hero (nowy design + panel statystyk)
- [x] Breadcrumby Rank Math w hero
- [x] Sekcja Usługi (akordeon + ACF)
- [x] Sekcja Portfolio (rozwijane projekty + ACF)
- [x] Sekcja Jak działamy (timeline, hardcode)
- [x] Sekcja Benefits (karty, ACF, reużywalna)
- [x] Sekcja Opinie (slider, ACF Options, globalna)
- [x] Sekcja CTA (hardcode, reużywalna)
- [x] Komponent Blog Posts (reużywalny, propsy)
- [x] Sekcja Newsletter (hardcode)
- [x] Sekcja Kontakt (formularz, hardcode)
- [x] Footer (4 kolumny, hardcode)
- [ ] Podstrona Usługi
- [ ] Pozostałe podstrony
- [ ] Backend formularzy (kontakt, newsletter)
