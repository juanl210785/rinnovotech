import { createIcons, icons } from 'lucide';

// Render inicial de íconos
document.addEventListener('DOMContentLoaded', () => {
    createIcons({ icons, 'stroke-width': 1.5, nameAttr: 'data-lucide' });
});

// Re-render tras cambios de Livewire
document.addEventListener('livewire:load', () => {
    Livewire.hook('message.processed', () => {
        createIcons({ icons, 'stroke-width': 1.5, nameAttr: 'data-lucide' });
    });
});

