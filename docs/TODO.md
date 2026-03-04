# GridField "Kitchen Sink" TODOs

Hier sind die geplanten GridField-Beispiele, basierend auf dem Vortrag "A Dive Into Gridfield".

## Organisation
- Jedes Beispiel befindet sich in seinem eigenen Namespace unter `Netwerkstatt\JustGridding\Examples\{FeatureName}`.
- Die Dokumentation liegt als `README.md` direkt im Verzeichnis des Beispiels und wird im CMS über ein `LiteralField` (Markdown-geparst) angezeigt.

## Beispiele & Status

| Feature | Schwierigkeit | Status | Beschreibung |
| :--- | :--- | :--- | :--- |
| **GridFieldConfig_Base** | Beginner | ✅ | Einfache Read-only Ansicht. |
| **GridFieldConfig_RecordEditor** | Beginner | ✅ | Standard Bearbeitung von Datensätzen. |
| **Custom Summary Fields** | Beginner | ✅ | Konfiguration von `$summary_fields` inkl. Relationen. |
| **GridField_HTMLProvider** | Standard | ⏳ | Eigenes HTML (Header/Footer) hinzufügen. |
| **Lumberjack** | Standard | ⏳ | Seitenverwaltung via GridField (unclutter sitetree). |
| **GridFieldExtensions: OrderableRows** | Standard | ⏳ | Drag & Drop Sortierung. |
| **GridFieldExtensions: MultiClass** | Standard | ⏳ | Verschiedene Subklassen in einem Grid anlegen. |
| **Inline Editing** | Standard | ⏳ | Bearbeiten von Feldern direkt in der Liste. |
| **Bulk Editing (BulkManager)** | Standard | ⏳ | Aktionen auf mehrere Datensätze gleichzeitig. |
| **Nested GridFields** | Advanced | ⏳ | GridField innerhalb eines GridFields. |
| **Fluent Integration** | Advanced | ⏳ | Lokalisierung im GridField (Visible Locales Column). |
| **Custom GridField Component** | Pro | ⏳ | Eine komplett eigene Komponente (z.B. Status-Ampel). |
| **GridFieldItemRequest Extension** | Pro | ⏳ | Eigene Buttons/Aktionen im Edit-Formular. |
| **Style Rows with CSS** | Advanced | ⏳ | Zeilen basierend auf Daten einfärben. |
| **Tiled / Calendar Layout** | Advanced | ⏳ | Alternative Layouts für das GridField. |

## Legende
- ⏳: Ausstehend
- 🔨: In Arbeit
- ✅: Fertiggestellt
