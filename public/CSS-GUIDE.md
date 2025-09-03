# Panduan CSS Enhanced - Tema Hitam & Orange

## 🎨 Warna Tema
```css
:root {
    --black: #1a1a1a;          /* Warna hitam utama */
    --dark-gray: #ffffffff;      /* Abu-abu gelap */
    --medium-gray: #ffffffff;    /* Abu-abu medium */
    --light-gray: #ffffffff;     /* Abu-abu terang */
    --orange: #ff6b00;         /* Orange utama */
    --light-orange: #ff8c33;   /* Orange terang */
    --dark-orange: #e55a00;    /* Orange gelap */
    --white: #ffffff;          /* Putih */
    --off-white: #f5f5f5;      /* Putih off */
}
```

## 🧩 Komponen yang Tersedia

### 1. Layout
```html
<div class="app-container">
    <header>...</header>
    <nav>...</nav>
    <main>...</main>
    <footer>...</footer>
</div>
```

### 2. Header & Navigation
```html
<header>
    <div class="header-content">
        <h1>Judul Website</h1>
    </div>
</header>

<nav>
    <div class="nav-container">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </div>
</nav>
```

### 3. Cards
```html
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Judul Card</h3>
    </div>
    <p>Konten card...</p>
</div>
```

### 4. Buttons
```html
<button class="btn btn-primary">Primary Button</button>
<button class="btn btn-secondary">Secondary Button</button>
<button class="btn btn-primary btn-sm">Small Button</button>
<button class="btn btn-primary btn-lg">Large Button</button>
```

### 5. Forms
```html
<div class="form-group">
    <label for="name">Nama</label>
    <input type="text" id="name" class="form-control" placeholder="Masukkan nama">
</div>
```

### 6. Tables
```html
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>john@example.com</td>
            </tr>
        </tbody>
    </table>
</div>
```

### 7. Alerts
```html
<div class="alert alert-success">Success message!</div>
<div class="alert alert-error">Error message!</div>
<div class="alert alert-info">Info message!</div>
```

## 🎯 Utility Classes

### Text Alignment
```css
.text-center    /* Rata tengah */
.text-left      /* Rata kiri */
.text-right     /* Rata kanan */
```

### Text Colors
```css
.text-orange    /* Warna orange */
.text-white     /* Warna putih */
.text-gray      /* Warna abu-abu */
```

### Background Colors
```css
.bg-black       /* Background hitam */
.bg-dark        /* Background dark gray */
.bg-orange      /* Background orange */
```

### Spacing
```css
.mt-1 sampai .mt-5   /* Margin top */
.mb-1 sampai .mb-5   /* Margin bottom */
.p-1 sampai .p-5     /* Padding */
```

### Flexbox
```css
.flex              /* Display flex */
.flex-col          /* Flex direction column */
.items-center      /* Align items center */
.justify-center    /* Justify content center */
.justify-between   /* Justify content between */
.gap-2, .gap-4     /* Gap spacing */
```

### Other Utilities
```css
.rounded          /* Border radius */
.rounded-full     /* Border radius full */
.shadow           /* Shadow regular */
.shadow-lg        /* Shadow large */
.hidden           /* Display none */
.block            /* Display block */
.opacity-50       /* Opacity 50% */
.transition       /* Transition effect */
```

## 🎭 Animations
```css
.animate-fadeIn   /* Fade in animation */
.animate-slideIn  /* Slide in animation */
.animate-pulse    /* Pulse animation */
```

## 📱 Responsive Design

### Breakpoints:
- **768px dan bawah**: Tablet & Mobile
- **480px dan bawah**: Mobile kecil

### Grid System:
```html
<div class="grid grid-2">   <!-- 2 kolom -->
<div class="grid grid-3">   <!-- 3 kolom -->
<div class="grid grid-4">   <!-- 4 kolom -->
```

## 🚀 Cara Menggunakan

1. **Link CSS di HTML:**
```html
<link rel="stylesheet" href="/public/enhanced-style.css">
```

2. **Gunakan class yang tersedia**
3. **Customize sesuai kebutuhan**

## 💡 Tips

- Gunakan variabel CSS untuk konsistensi warna
- Manfaatkan utility classes untuk rapid development
- Test responsive design di berbagai device
- Gunakan animasi untuk meningkatkan UX

## 🔧 Customization

Untuk mengubah tema, edit variabel CSS di `:root`:
```css
:root {
    --orange: #your-color; /* Ganti warna orange */
    --border-radius: 12px; /* Ganti border radius */
}
```

## 📋 Browser Support
- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+
