# AdvancedBroadcast

## Overview
AdvancedBroadcast es un plugin avanzado para PocketMine-MP que permite enviar mensajes automáticos y manuales al chat del servidor, con soporte para variables, colores, permisos y opciones por jugador.

## Características
- Mensajes automáticos configurables y personalizables.
- Intervalo de tiempo ajustable.
- Soporte para colores (&a, &b, etc.) y variables como `{online}` y `{player}` aleatorio.
- Comando `/broadcast <mensaje>` para enviar mensajes manualmente.
- Permiso para desactivar mensajes automáticos por jugador (`/automessage toggle`).
- Sistema de permisos avanzado.

## Instalación
1. Descarga la última versión de AdvancedBroadcast.
2. Coloca la carpeta en el directorio `plugins` de tu servidor PocketMine-MP.
3. Configura `resources/config.yml` a tu gusto.
4. Reinicia el servidor.

## Configuración
En `resources/config.yml` puedes personalizar:
- `messages`: Lista de mensajes automáticos.
- `interval`: Intervalo en segundos entre mensajes.

## Uso
- `/broadcast <mensaje>`: Envía un mensaje a todos los jugadores.
- `/automessage toggle`: Activa o desactiva los mensajes automáticos para ti.

## Permisos
- `advancedbroadcast.command.broadcast`: Permite usar el comando `/broadcast`.
- `advancedbroadcast.toggle`: Permite activar/desactivar mensajes automáticos.

## Contribuir
¡Se aceptan sugerencias y mejoras vía pull request!

## Licencia
MIT License.
