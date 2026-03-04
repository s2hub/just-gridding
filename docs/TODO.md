# GridField "Kitchen Sink" TODOs

Here are the planned GridField examples, based on the talk "A Dive Into Gridfield".

## Organisation
- Each example is located in its own namespace under `S2Hub\JustGridding\Examples\{Topic}\{FeatureName}`.
- Documentation is stored as `README.md` directly in the example directory and displayed in the CMS via a `LiteralField` (Markdown-parsed).
- **Metadata**: Each `README.md` contains YAML frontmatter (difficulty, status, tags), which is used for display in the CMS.

## Examples & Status (Thematically Organized)

### **Basics**
| Feature | Difficulty | Status | Description |
| :--- | :--- | :--- | :--- |
| **GridFieldConfig_Base** | Beginner | ✅ | Simple read-only view. |
| **GridFieldConfig_RecordEditor** | Beginner | ✅ | Standard record editing. |
| **Custom Summary Fields** | Beginner | ✅ | Configuration of `$summary_fields` including relations. |

### **UI & Styling**
| Feature | Difficulty | Status | Description |
| :--- | :--- | :--- | :--- |
| **GridField_HTMLProvider** | Standard | ⏳ | Add custom HTML (Header/Footer). |
| **Style Rows with CSS** | Advanced | ⏳ | Colorize rows based on data. |
| **Tiled / Calendar Layout** | Advanced | ⏳ | Alternative layouts for the GridField. |

### **Extensions & Workflow**
| Feature | Difficulty | Status | Description |
| :--- | :--- | :--- | :--- |
| **GridFieldExtensions: OrderableRows** | Standard | ⏳ | Drag & Drop sorting. |
| **GridFieldExtensions: MultiClass** | Standard | ⏳ | Create different subclasses in one grid. |
| **Inline Editing** | Standard | ⏳ | Edit fields directly in the list. |
| **Bulk Editing (BulkManager)** | Standard | ⏳ | Actions on multiple records simultaneously. |
| **Lumberjack** | Standard | ⏳ | Page management via GridField (unclutter sitetree). |

### **Advanced Customization**
| Feature | Difficulty | Status | Description |
| :--- | :--- | :--- | :--- |
| **Custom GridField Component** | Pro | ⏳ | A completely custom component (e.g., status indicator). |
| **GridFieldItemRequest Extension** | Pro | ⏳ | Custom buttons/actions in the edit form. |
| **Nested GridFields** | Advanced | ⏳ | GridField within a GridField. |

### **Integrations**
| Feature | Difficulty | Status | Description |
| :--- | :--- | :--- | :--- |
| **Fluent Integration** | Advanced | ⏳ | Localization in GridField (Visible Locales Column). |

## Legend
- ⏳: Pending
- 🔨: In Progress
- ✅: Completed
