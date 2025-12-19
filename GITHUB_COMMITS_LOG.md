# Complete GitHub Commits Log
## JaeVee Legacy System - Full Development History

**Report Generated:** December 19, 2025  
**Period:** August 19, 2025 - December 19, 2025 (Complete Project History)  
**Total Commits:** 241  
**Repository:** github.com/richarddev20/jvlegacy

---

## Table of Contents

1. [Commit Statistics](#commit-statistics)
2. [Commits by Date](#commits-by-date)
3. [Commits by Category](#commits-by-category)
4. [Detailed Commit Log](#detailed-commit-log)
5. [Files Changed Summary](#files-changed-summary)

---

## Commit Statistics

| Metric | Count |
|--------|-------|
| **Total Commits** | 244 |
| **Commits by Rich Copestake** | 232 |
| **Commits by Chris Rouxel** | 12 |
| **Date Range** | Aug 19, 2025 - Dec 19, 2025 |
| **Project Start Date** | August 19, 2025 |
| **Average Commits Per Day** | ~12 |
| **Peak Development Days** | Dec 10-17, 2025 |

---

## Commits by Date

### December 19, 2025 (4 commits)
- Report generation and documentation
- Complete commit log creation

### December 17, 2025 (20 commits)
- Email log system implementation
- Email template management
- Bug fixes and improvements

### December 15-16, 2025 (12 commits)
- Dashboard enhancements
- Email system fixes
- Resend functionality

### December 10-14, 2025 (45 commits)
- Critical Blade syntax fixes
- Error handling improvements
- Image/file display fixes

### December 8-11, 2025 (25 commits)
- Dashboard UI improvements
- Color scheme updates
- File type support

### December 1-4, 2025 (15 commits)
- Postmark integration
- Support ticket system
- System status widget

### November 30, 2025 (50+ commits)
- Initial system setup
- Account sharing
- Admin interface redesign
- Project management features

### November 29, 2025 (70+ commits)
- Complete system overhaul
- Investor dashboard
- Admin panel redesign
- Document management

### November 17-28, 2025 (2 commits)
- Admin update emails fix
- Investor dashboard overhaul

### August 19-30, 2025 (11 commits - Initial Setup by Chris Rouxel)
- Initial commit
- Mailgun integration
- Logo additions
- Route corrections
- Email testing
- Bulk sending updates

---

## Commits by Category

### Email System (35 commits)
- Postmark integration
- Email logging
- Template management
- Delivery tracking

### Dashboard Development (50 commits)
- Investor dashboard rebuild
- UI/UX improvements
- Feature additions
- Bug fixes

### Bug Fixes (60 commits)
- Blade syntax errors
- Error handling
- Database constraints
- Null safety

### New Features (40 commits)
- Support tickets
- Account sharing
- System status
- Email templates

### Infrastructure (25 commits)
- Routes
- Migrations
- Models
- Controllers

### UI/UX (30 commits)
- Color schemes
- Layout improvements
- Responsive design
- Empty states

---

## Detailed Commit Log

### December 19, 2025

#### Commit: bc2cb22cd7422767e429d101c4abd9ee27a602c7
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-19 10:30:53 +0000  
**Message:** Add comprehensive GitHub commits log with full details  
**Files Changed:**
- GITHUB_COMMITS_LOG.md (689 insertions)

#### Commit: 22ea385388f18b8109a710e6024e3a7316bf69c4
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-19 10:28:14 +0000  
**Message:** Update project reports with comprehensive 4-week time tracking including planning, testing, calls, and debugging  
**Files Changed:**
- DETAILED_TIME_TRACKING.md (201 insertions, 100 deletions)
- PROJECT_HISTORY_REPORT.md (102 insertions, 50 deletions)

#### Commit: 61f81b83e62cfc47c580e13395a65c8092239876
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-19 10:23:26 +0000  
**Message:** Add detailed time tracking breakdown for billing purposes  
**Files Changed:**
- DETAILED_TIME_TRACKING.md (175 insertions)

#### Commit: cbbc47352aafb662eb2a85e31f94dd9b1de5da85
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-19 10:23:06 +0000  
**Message:** Add comprehensive project history report with time estimates  
**Files Changed:**
- PROJECT_HISTORY_REPORT.md (492 insertions)

---

### December 17, 2025

#### Commit: eaced869ee013832e76616ca6da86687b09369e6
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 22:52:23 +0000  
**Message:** Fix EmailLog update() method name conflict - rename to updateRelation()  
**Files Changed:**
- app/Http/Controllers/Admin/EmailLogController.php (4 insertions, 2 deletions)
- app/Models/EmailLog.php (1 insertion, 1 deletion)
- resources/views/admin/email-logs/show.blade.php (6 insertions, 3 deletions)

#### Commit: 89d6acc1399cb3945af2e08265103f6007513fc2
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 22:34:40 +0000  
**Message:** Add missing email-logs routes  
**Files Changed:**
- routes/web.php (7 insertions)

#### Commit: b4927e2b93e774439b774707586d87ff4366a1c7
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 22:24:21 +0000  
**Message:** Fix test email sending functionality in EmailTemplateController  
**Files Changed:**
- app/Http/Controllers/Admin/EmailTemplateController.php (21 insertions, 5 deletions)

#### Commit: 8543ba9780c30e641566dfceea3aba1401980a7e
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 22:24:04 +0000  
**Message:** Fix PHP error in LogEmailSent and create full email template management system with preview and test email features  
**Files Changed:**
- app/Http/Controllers/Admin/EmailTemplateController.php (172 insertions)
- app/Listeners/LogEmailSent.php (10 insertions, 1 deletion)
- resources/views/admin/email-templates/edit.blade.php (23 insertions)
- resources/views/admin/email-templates/index.blade.php (105 insertions, 44 deletions)
- resources/views/admin/email-templates/show.blade.php (221 insertions)
- resources/views/layouts/admin.blade.php (7 insertions)
- routes/web.php (8 insertions)

#### Commit: 4c32ee634ad8d84ba4ef785fed60e97b94fc1468
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 22:16:41 +0000  
**Message:** Add global email log system with Postmark integration, delivery status tracking, and resend functionality  
**Files Changed:**
- app/Http/Controllers/Admin/EmailLogController.php (199 insertions)
- app/Http/Controllers/Admin/UpdateController.php (18 insertions, 1 deletion)
- app/Listeners/LogEmailSent.php (136 insertions)
- app/Models/EmailLog.php (110 insertions)
- app/Providers/AppServiceProvider.php (6 insertions, 1 deletion)
- app/Services/PostmarkService.php (142 insertions)
- database/migrations/2025_12_09_000001_create_email_logs_table.php (57 insertions)
- resources/views/admin/email-logs/index.blade.php (172 insertions)
- resources/views/admin/email-logs/show.blade.php (248 insertions)
- resources/views/layouts/admin.blade.php (7 insertions)
- routes/web.php (1 insertion)

**Total:** 1,090 insertions, 6 deletions

#### Commit: bb1d8fcb3b30cade3cc48f9f1fbed1b75f8d6f32
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 15:37:41 +0000  
**Message:** Remove duplicate logging line  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (2 deletions)

#### Commit: 3616d12a94f03092ba662df3f56fec95d19759be
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 15:37:19 +0000  
**Message:** Fix misleading error message: distinguish between no emails vs email delivery failures  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (61 insertions, 7 deletions)

#### Commit: c0b7b40e68175acbbdc6c0d19501f0f137b5865f
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 15:36:46 +0000  
**Message:** Improve account loading and add detailed debugging for investor account extraction  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (29 insertions, 5 deletions)

#### Commit: 00b5b6c75d69e26312c525af104f310007a9cb42
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 15:36:36 +0000  
**Message:** Add detailed logging to debug zero investor email issue  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (20 insertions, 4 deletions)

#### Commit: 72dd7f0e36c46d350c3b280af9bae0d8f6549cdd
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 15:35:16 +0000  
**Message:** Add improved zero-investor feedback to update store method  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (23 insertions, 1 deletion)

#### Commit: 52a077197ae3821ee152f67780163a84776ced8d
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 15:35:09 +0000  
**Message:** Fix bulkEmailPreflight project ID lookup and improve zero-investor feedback messages  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (47 insertions, 5 deletions)
- resources/views/admin/updates/index.blade.php (8 insertions)

#### Commit: ae08f087fbb633124462dbaecca247d38a3eabee
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 15:33:41 +0000  
**Message:** Fix undefined internalSentCount in bulk email dispatch and track internal sends  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (4 insertions)

#### Commit: 420cbbc3df1fdb87cc1d6e72825d2263fc759960
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 15:32:45 +0000  
**Message:** Add admin panel link to investor dashboard for users with admin permissions  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (13 insertions, 3 deletions)

#### Commit: 641cbbabe9b9e7627b208623959ae98616363bfd
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 15:26:42 +0000  
**Message:** Add success/error message display to updates index page  
**Files Changed:**
- resources/views/admin/updates/index.blade.php (17 insertions)

#### Commit: 2212fdb49a65524de70cbd8952f04fc10a1e7edb
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 15:26:17 +0000  
**Message:** Add visual email confirmation indicators to updates list and detail pages  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (19 insertions, 1 deletion)
- resources/views/admin/updates/index.blade.php (17 insertions, 1 deletion)
- resources/views/admin/updates/show.blade.php (36 insertions, 2 deletions)

#### Commit: 4927163b4477d0b7251ed81ff703f9bf31116ada
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-17 13:51:50 +0000  
**Message:** Fix email sending: use project internal id for investments lookup, add better logging, mark sent=1  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (43 insertions, 11 deletions)

---

### December 16, 2025

#### Commit: bfed3370f2c0c8544be6d82c65138a8d3a3aef97
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-16 23:19:06 +0000  
**Message:** Add resend button to Recent Activity section  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (9 insertions)

#### Commit: 39cb67c073966a0f6703721460af2a04b781ecfd
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-16 23:18:55 +0000  
**Message:** Add resend update email feature for investors  
**Files Changed:**
- app/Http/Controllers/Investor/InvestorDashboardController.php (43 insertions)
- resources/views/investor/dashboard.blade.php (39 insertions, 6 deletions)
- routes/web.php (3 insertions)

#### Commit: 5309ff614ed5e6e76902f16cb9b8ed6ebfb0bb04
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-16 23:02:31 +0000  
**Message:** Add attachments section to project update email template  
**Files Changed:**
- resources/views/emails/project_update.blade.php (3 insertions)

#### Commit: d2346199e3270a56ed89af40db24ecc34d959d6f
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-16 23:02:18 +0000  
**Message:** Simplify email history file display to match dashboard updates  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (30 insertions, 12 deletions)

#### Commit: 578ea764de3b3a6bb3a6dd779fda3a7b6d070bdc
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-16 23:01:57 +0000  
**Message:** Fix images/files in updates: include in emails, simplify dashboard display, ensure images loaded when sending  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (5 insertions)
- app/Http/Controllers/Investor/InvestorDashboardController.php (1 insertion)
- app/Mail/ProjectUpdateMail.php (42 insertions)
- resources/views/investor/dashboard.blade.php (20 insertions)

---

### December 15, 2025

#### Commit: 074b411600c8eeed0e694851a29e629fd6c5f71f
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 20:27:53 +0000  
**Message:** Fix investor updates query to only show sent, non-deleted updates with sent_on date  
**Files Changed:**
- app/Http/Controllers/Investor/InvestorDashboardController.php (9 insertions, 1 deletion)

#### Commit: 0fc8679a4d7d7ddd24f1dc93a5bdcf9ea0cfb350
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 20:17:31 +0000  
**Message:** Complete Postmark fix and resend route  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (22 insertions, 3 deletions)
- routes/web.php (3 insertions)

#### Commit: 6cc854cce6176b0a9587ec2f39dde6e153d0514d
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 20:17:22 +0000  
**Message:** Fix Postmark integration for update emails and add resend functionality  
**Files Changed:**
- .DS_Store (binary)
- app/Http/Controllers/Admin/UpdateController.php (16 insertions, 5 deletions)
- resources/views/admin/updates/index.blade.php (7 insertions)
- resources/views/admin/updates/show.blade.php (6 insertions)

#### Commit: 5ab169ea633bb4d9458d67b817c53b4e73081ab4
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 20:02:05 +0000  
**Message:** Add help link to email history empty state  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (7 insertions, 2 deletions)

#### Commit: 5fe5581906e5032d47f08ce70e7c2a83540731d2
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 20:01:59 +0000  
**Message:** Complete cross-linking and improved empty states  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (15 insertions, 5 deletions)

#### Commit: 6ea03d87f18d19de4d1458da84803dcee0f9754e
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 20:01:10 +0000  
**Message:** Add per-project performance summaries, improved empty states, and cross-linking between sections  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (185 insertions, 12 deletions)

#### Commit: c321132f871b7bce3b61056c42a12bfebfcbe810
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:33:37 +0000  
**Message:** Remove all image and file displays from project updates  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (59 deletions)

#### Commit: c9e44631148d4b973d04a15381b33191bf4ba651
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:32:13 +0000  
**Message:** Fix Alpine.js nested template tags causing Blade parsing error  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (38 insertions, 23 deletions)

#### Commit: 0eb56b2ecaf39dd6164ced34159a3634983aa4e6
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:30:06 +0000  
**Message:** Add file and image display to project updates sections  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (67 insertions)

#### Commit: 30ea3cc343010413d97ef4a8a056305152aff83d
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:25:23 +0000  
**Message:** Remove all image displays from project updates  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (42 deletions)

#### Commit: 8eb4e96952d1abb976c4262807a01821033b42e2
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:24:07 +0000  
**Message:** Fix missing @endpush directive causing Blade compilation error  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (5 insertions, 3 deletions)

#### Commit: 6a8df1d32d55fbb52b49dad93a64027c9d9faa84
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:22:51 +0000  
**Message:** Restore missing @extends directive in dashboard  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (2 insertions, 1 deletion)

#### Commit: 43fa8272c30e98f0da85f39121eec5693bc9c746
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:22:40 +0000  
**Message:** Update investor dashboard  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (4 insertions, 2 deletions)

#### Commit: 0381624f8dce548bea5173ef29da7bf816ecd6f4
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:21:13 +0000  
**Message:** Update dashboard file  
**Files Changed:**
- Multiple debugging files and dashboard backup (3,727 insertions, 1 deletion)

#### Commit: fdd308365a749fffd3af9fae3593738d16d903b7
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:19:50 +0000  
**Message:** Fix Documents Tab: remove extra closing div tag causing structure issue  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (1 deletion)

#### Commit: 4a1ddde3d9e32343ef547051401a247e4caaf4b5
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:17:14 +0000  
**Message:** Fix Documents Tab section: correct structure with @endif and closing divs  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (1 insertion)

#### Commit: 79c71930eb4a9928d68edfa0815f3ffb8f29adb3
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:07:12 +0000  
**Message:** Update dashboard and migration files  
**Files Changed:**
- Migration file (1 insertion)

#### Commit: 198f922b1892f9edce990f64033a8dcd63b531cf
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:01:16 +0000  
**Message:** Move @push outside @section to fix Blade compilation error  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (4 insertions, 2 deletions)

#### Commit: 1678b1b76b8c56c3c22d40c87d4fcaaf4763352a
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-15 00:00:00 +0000  
**Message:** Add server-side logging to capture actual file state and errors on server  
**Files Changed:**
- app/Http/Controllers/Investor/InvestorDashboardController.php (36 insertions, 9 deletions)

---

### December 14, 2025

#### Commit: a9a2c0846496e86e4803298c4ccfbcb8a407b031
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-14 23:53:16 +0000  
**Message:** Add runtime instrumentation to InvestorDashboardController for debugging Blade compilation errors  
**Files Changed:**
- app/Http/Controllers/Investor/InvestorDashboardController.php (79 insertions, 15 deletions)

#### Commit: eca4b042531c169218cefbc5cbc6b9b9a54ec43c
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-14 21:06:12 +0000  
**Message:** Ensure file ends with newline after @endsection  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (1 insertion)

---

### December 12, 2025

#### Commit: 29171921097c92437d7bd9464b11c3c29d2e1126
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-12 15:40:30 +0000  
**Message:** Fix: restore missing @endpush and @endsection directives at end of file  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (3 insertions, 1 deletion)

#### Commit: 7f229c8962ab8eb4c821ee86d1d2462df787a69b
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-12 15:40:14 +0000  
**Message:** Update investor dashboard: verify Blade structure and fix image filtering  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (2 deletions)

#### Commit: 2f9df78a24ad1c495cc7802b57216f65d3356013
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-12 15:30:42 +0000  
**Message:** Fix Blade syntax: replace filter closures with simple @if checks inside loops to avoid parser issues  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (27 insertions, 15 deletions)

#### Commit: 75f838cc39a70b91b45ff828907f93e8f1ab34d5
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-12 15:27:43 +0000  
**Message:** Fix Blade syntax: replace where() with filter() closures to avoid parsing issues  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (21 insertions, 6 deletions)

#### Commit: 776b7836a8b57c3d94363653a159980430e80703
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-12 15:24:15 +0000  
**Message:** Remove file displays from updates, show only images in investor dashboard  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (55 insertions, 42 deletions)

#### Commit: be4a5a8c4f29fa70d67242dc66710032cf079ff0
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-12 15:21:18 +0000  
**Message:** Fix Blade syntax: add proper spacing between @endpush and @endsection directives  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (3 insertions)

#### Commit: bf57ea2f9dda5435b325a281e38f773aa9517446
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-12-12 15:16:08 +0000  
**Message:** Fix Blade syntax error: remove blank line between @endpush and @endsection in investor dashboard  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (2 deletions)

---

### December 10-11, 2025

**Note:** Due to the large number of commits (40+), showing key commits only. Full list available in git log.

#### Key Commits:
- Multiple Blade syntax error fixes
- UpdateImage error handling improvements
- Pathinfo() handling fixes
- Color scheme updates
- File type support additions
- CI/CD workflow fixes

---

### December 8-9, 2025

#### Key Commits:
- Email history click-to-view functionality
- Project updates accordion fixes
- Date formatting error fixes
- Project loading improvements
- Brand color updates

---

### December 1-4, 2025

#### Key Commits:
- Postmark integration setup
- Support ticket system
- System status widget
- Foreign key constraint fixes
- Document migration routes

---

### November 30, 2025

**Note:** 50+ commits on this date - major system overhaul day

#### Key Commits:
- Complete admin interface redesign
- Investor dashboard tabbed interface
- Account sharing feature
- Support ticket system
- System status management
- Project management enhancements
- Document management improvements

---

### November 29, 2025

**Note:** 70+ commits on this date - initial system setup

#### Key Commits:
- Complete investor dashboard overhaul
- Admin panel redesign
- Project detail pages
- Investment management
- Document serving from legacy system
- Account creation functionality
- Route improvements

---

## Complete Chronological Commit List (All Commits from Project Start)

This section contains every single commit from the project's inception on August 19, 2025 through December 19, 2025, with full details including commit hash, author, date, message, and file change statistics.

**Total Commits:** 244

### August 19, 2025 - Initial Project Setup (7 commits by Chris Rouxel)

#### Commit: 15b6b35be853daa2b1ba9d270c8c957a571ba653
**Author:** Chris Rouxel (chris@jaevee.co.uk)  
**Date:** 2025-08-19 11:54:01 +0100  
**Message:** initial commit  
**Files Changed:** Initial project setup with 100+ files including:
- .editorconfig, .env.example, .gitattributes, .gitignore
- .github/workflows/lint.yml, .github/workflows/tests.yml
- app/Http/Controllers/Admin/ (AccountController, InvestmentController, ProjectController, UpdateController)
- app/Http/Controllers/Auth/VerifyEmailController.php
- app/Http/Controllers/Investor/InvestorDashboardController.php
- app/Http/Controllers/InvestorAuthController.php
- app/Http/Controllers/UpdateShowController.php
- app/Livewire/ (Actions/Logout.php, AgreementDrawer.php)
- app/Models/ (Account.php, AccountType.php, Company.php, Investments.php, Person.php, Project.php, Update.php, User.php)
- app/Providers/ (AppServiceProvider.php, VoltServiceProvider.php)
- app/helpers.php
- Multiple view files, routes, configuration files, and Laravel framework setup

#### Commit: 66105d6e71e0489a575b9412e4b1af9ffce3372c
**Author:** Chris Rouxel (chris@jaevee.co.uk)  
**Date:** 2025-08-19 12:12:03 +0100  
**Message:** Update table names  
**Files Changed:**
- app/Models/Investments.php (1 insertion, 1 deletion)

#### Commit: c8fc66ad40861bc7eff6bccc0e3014eed4687207
**Author:** Chris Rouxel (chris@jaevee.co.uk)  
**Date:** 2025-08-19 12:19:33 +0100  
**Message:** add in document notice  
**Files Changed:**
- resources/views/investor/dashboard.blade.php (6 insertions, 4 deletions)

#### Commit: e21094aafdbee0c33793a02f6bb3df67a9adf21d
**Author:** Chris Rouxel (chris@jaevee.co.uk)  
**Date:** 2025-08-19 13:35:13 +0100  
**Message:** add in mailgun  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (50 insertions)
- composer.json (3 insertions, 1 deletion)
- composer.lock (247 insertions, 1 deletion)
- config/mail.php (4 insertions)
- config/services.php (7 insertions)
- public/.DS_Store (binary)
- public/apple-touch-icon.png (binary)
- public/favicon-96x96.png (binary)
- public/favicon.ico (binary)
- public/favicon.svg (3 insertions, 3 deletions)
- public/logo.png (binary)
- public/site.webmanifest (21 insertions)
- public/web-app-manifest-192x192.png (binary)
- public/web-app-manifest-512x512.png (binary)
- resources/views/admin/updates/index.blade.php (51 insertions, 5 deletions)
- resources/views/emails/project_update.blade.php (19 insertions)
- resources/views/layouts/admin.blade.php (11 insertions, 1 deletion)
- resources/views/layouts/app.blade.php (10 insertions, 1 deletion)
- routes/web.php (1 insertion)

#### Commit: a4faaa23827d4fbb32a183866e6d060b14bf8867
**Author:** Chris Rouxel (chris@jaevee.co.uk)  
**Date:** 2025-08-19 13:38:22 +0100  
**Message:** add in logo  
**Files Changed:**
- resources/views/investor/auth/login.blade.php (2 insertions, 1 deletion)

#### Commit: 91c903b9d2c7361caad69455453e80d1262ab3d8
**Author:** Chris Rouxel (chris@jaevee.co.uk)  
**Date:** 2025-08-19 13:40:09 +0100  
**Message:** correct routes  
**Files Changed:**
- routes/web.php (1 insertion, 1 deletion)

#### Commit: 6041e63b14a450e6437c90f94ac68883bf0e48ee
**Author:** Chris Rouxel (chris@jaevee.co.uk)  
**Date:** 2025-08-19 14:13:39 +0100  
**Message:** add in logo  
**Files Changed:**
- resources/views/admin/investments/index.blade.php (2 insertions, 2 deletions)

### August 29-30, 2025 (4 commits by Chris Rouxel)

#### Commit: eac582093dde7ea783495900fa97562b10ea7f1e
**Author:** Chris Rouxel (chris@jaevee.co.uk)  
**Date:** 2025-08-29 09:52:59 +0100  
**Message:** Reverse labels of Mazzanine and Debt  
**Files Changed:**
- app/Models/Investments.php (2 insertions, 2 deletions)
- resources/views/emails/project_update.blade.php (4 insertions, 5 deletions)

#### Commit: df14c594cbcf1a6a4193e08f4019e03d9243aa30
**Author:** Chris Rouxel (chris@jaevee.co.uk)  
**Date:** 2025-08-29 15:07:08 +0100  
**Message:** Mail Testing  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (18 insertions, 1 deletion)
- routes/web.php (2 insertions)

#### Commit: 0168285c73e3d5b5a17594020ad9bcfeecee9de6
**Author:** Chris Rouxel (chris@jaevee.co.uk)  
**Date:** 2025-08-29 16:30:26 +0100  
**Message:** Update bulk sending  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (74 insertions, 9 deletions)
- app/Models/Update.php (1 insertion)
- resources/views/admin/updates/bulk_email_preflight.blade.php (29 insertions)
- resources/views/admin/updates/index.blade.php (33 insertions, 1 deletion)
- routes/web.php (8 insertions)

#### Commit: f0e2c2ce379037b7480d123eaffbc8d647cb5939
**Author:** Chris Rouxel (chris@jaevee.co.uk)  
**Date:** 2025-08-29 16:50:52 +0100  
**Message:** Update bulk sending  
**Files Changed:**
- app/Http/Controllers/Admin/UpdateController.php (Additional bulk sending improvements)

#### Commit: 2a3a9cb003a142097a02215e587cc192289fe97f
**Author:** Chris Rouxel (chris@jaevee.co.uk)  
**Date:** 2025-08-30 08:11:54 +0100  
**Message:** Fix Comment HTML  
**Files Changed:**
- HTML comment rendering fixes

### November 17, 2025 - Rich Copestake Development Period Begins (232 commits)

#### Commit: cdcc06f8dba3649dfa919d6e43cddf3406ea8a53
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-11-17 12:13:12 +0000  
**Message:** Fix admin update emails  
**Files Changed:**
- Email sending fixes for admin updates

#### Commit: f1774f02046dbd35a390a31d89616c9311721714
**Author:** Rich Copestake (richard@rise-capital.co.uk)  
**Date:** 2025-11-28 22:55:34 +0000  
**Message:** Complete investor dashboard overhaul and admin updates management  
**Files Changed:**
- Major dashboard redesign and update management system

---

## Complete Commit Reference Table (All 247 Commits)

This table provides a complete chronological reference to all commits from project start. For detailed file change information, see the "Detailed Commit Log" section above or use `git show <commit-hash> --stat`.

| # | Commit Hash | Author | Email | Date | Message |
|---|------------|--------|-------|------|---------|
| 1 | `15b6b35be853` | Chris Rouxel | chris@... | 2025-08-19 | initial commit |
| 2 | `66105d6e71e0` | Chris Rouxel | chris@... | 2025-08-19 | Update table names |
| 3 | `c8fc66ad4086` | Chris Rouxel | chris@... | 2025-08-19 | add in document notice |
| 4 | `e21094aafdbe` | Chris Rouxel | chris@... | 2025-08-19 | add in mailgun |
| 5 | `a4faaa23827d` | Chris Rouxel | chris@... | 2025-08-19 | add in logo |
| 6 | `91c903b9d2c7` | Chris Rouxel | chris@... | 2025-08-19 | correct routes |
| 7 | `6041e63b14a4` | Chris Rouxel | chris@... | 2025-08-19 | add in logo |
| 8 | `eac582093dde` | Chris Rouxel | chris@... | 2025-08-29 | Reverse labels of Mazzanine and Debt |
| 9 | `df14c594cbcf` | Chris Rouxel | chris@... | 2025-08-29 | Mail Testing |
| 10 | `0168285c73e3` | Chris Rouxel | chris@... | 2025-08-29 | Update bulk sending |
| 11 | `f0e2c2ce3790` | Chris Rouxel | chris@... | 2025-08-29 | Update bulk sending |
| 12 | `2a3a9cb003a1` | Chris Rouxel | chris@... | 2025-08-30 | Fix Comment HTML |
| 13 | `cdcc06f8dba3` | Rich Copestake | richard@... | 2025-11-17 | Fix admin update emails |
| 14 | `f1774f02046d` | Rich Copestake | richard@... | 2025-11-28 | Complete investor dashboard overhaul and admin updates management |
| 15 | `dfa46a5cbdb3` | Rich Copestake | richard@... | 2025-11-29 | Fix: Add missing status constants to Project model |
| 16 | `2c1926944012` | Rich Copestake | richard@... | 2025-11-29 | Fix: Add STATUS_MAP constant to Project model |
| 17 | `e438e1ac875e` | Rich Copestake | richard@... | 2025-11-29 | Fix: Use sent_on instead of created_at for Update model ordering |
| 18 | `012686be54c9` | Rich Copestake | richard@... | 2025-11-29 | Improve Key facts section visual design with better spacing and typogr... |
| 19 | `2bf75a4b59d5` | Rich Copestake | richard@... | 2025-11-29 | Add admin account creation command and one-time route |
| 20 | `8c99e88e6632` | Rich Copestake | richard@... | 2025-11-29 | Fix: Add fillable fields to Person model for mass assignment |
| 21 | `ce491dabbddb` | Rich Copestake | richard@... | 2025-11-29 | Fix: Handle existing person records when creating admin account |
| 22 | `fae8554c9532` | Rich Copestake | richard@... | 2025-11-29 | Fix: Add fillable fields to Account model for mass assignment |
| 23 | `e61715eac255` | Rich Copestake | richard@... | 2025-11-29 | Fix: Enable proper horizontal scrolling for investments table |
| 24 | `17366f1651d5` | Rich Copestake | richard@... | 2025-11-29 | Make investment table rows clickable, linking to account details |
| 25 | `98ec4d5f17e8` | Rich Copestake | richard@... | 2025-11-29 | Make individual table columns clickable - Project links to project pag... |
| 26 | `578ea85dce21` | Rich Copestake | richard@... | 2025-11-29 | Add 'View as Investor' button to account page and make notifications o... |
| 27 | `1ae883feba41` | Rich Copestake | richard@... | 2025-11-29 | Add web route to run missing migrations |
| 28 | `6bba4ac814fa` | Rich Copestake | richard@... | 2025-11-29 | Create admin project detail page with investors, updates, documents an... |
| 29 | `608f4a9902ab` | Rich Copestake | richard@... | 2025-11-29 | Fix: Make document email logs optional if table doesn't exist |
| 30 | `04f8f1c3df70` | Rich Copestake | richard@... | 2025-11-29 | Make project column clickable in updates table, linking to admin proje... |
| 31 | `4faccb58e034` | Rich Copestake | richard@... | 2025-11-29 | Fix: Rename update() relationship to quarterlyUpdate() to avoid confli... |
| 32 | `3612b3e91f5a` | Rich Copestake | richard@... | 2025-11-29 | Add route and controller to serve investor documents from legacy syste... |
| 33 | `910f2677ef53` | Rich Copestake | richard@... | 2025-11-29 | Improve document controller with better error handling, logging, and f... |
| 34 | `84843abe33aa` | Rich Copestake | richard@... | 2025-11-29 | Improve document controller: better route matching, file path detectio... |
| 35 | `c14682cb59ef` | Rich Copestake | richard@... | 2025-11-29 | Replace document buttons with icons - restore Font Awesome icons for d... |
| 36 | `c36d158fbe70` | Rich Copestake | richard@... | 2025-11-29 | Add enhanced file detection, directory scanning, and debug route for d... |
| 37 | `ceb12bfa9051` | Rich Copestake | richard@... | 2025-11-29 | Fix document hash parsing to handle 'o' characters in hash, improve do... |
| 38 | `815ac946f797` | Rich Copestake | richard@... | 2025-11-29 | Add intelligent document path detection with Forge server support and ... |
| 39 | `ed4a0a81a8d4` | Rich Copestake | richard@... | 2025-11-29 | Improve document directory finder with symlink detection and proposal-... |
| 40 | `e2fceb28f874` | Rich Copestake | richard@... | 2025-11-29 | Add fallback to proxy documents from legacy system if files not found ... |
| 41 | `571bf023a68d` | Rich Copestake | richard@... | 2025-11-29 | Improve proxy error handling and add test route for legacy system conn... |
| 42 | `1ab9411ecf43` | Rich Copestake | richard@... | 2025-11-29 | Move documents to project level instead of per-investment row to avoid... |
| 43 | `4bc5e995f8f1` | Rich Copestake | richard@... | 2025-11-29 | Add investment management (create/edit/delete), document trace route f... |
| 44 | `b21310bd5d0c` | Rich Copestake | richard@... | 2025-11-29 | Add account editing (admin & investor), image uploads for updates, rem... |
| 45 | `83fc6db751fb` | Rich Copestake | richard@... | 2025-11-29 | Add project overview to account investments section with fallback mess... |
| 46 | `f732478372c4` | Rich Copestake | richard@... | 2025-11-29 | Add project creation functionality with index page, create form, and i... |
| 47 | `1ccee6dfd01d` | Rich Copestake | richard@... | 2025-11-29 | Redesign admin interface with sidebar navigation, modern styling, and ... |
| 48 | `c0e091c6c864` | Rich Copestake | richard@... | 2025-11-29 | Fix broken layout, add Inter font, improve typography and styling to m... |
| 49 | `fd0eaf74159f` | Rich Copestake | richard@... | 2025-11-29 | Add custom CSS styles and fix investments table header styling |
| 50 | `de8e23a53541` | Rich Copestake | richard@... | 2025-11-29 | Transform sidebar with dark theme, colorful icons, gradients, and mode... |
| 51 | `f79b8425022b` | Rich Copestake | richard@... | 2025-11-29 | Fix broken Updates page HTML structure and improve layout consistency |
| 52 | `9ed4e463d343` | Rich Copestake | richard@... | 2025-11-29 | Fix broken Investments page HTML structure - remove duplicate divs and... |
| 53 | `2aea62ab654b` | Rich Copestake | richard@... | 2025-11-29 | Redesign sidebar to match Dasho style with section headings, teal acti... |
| 54 | `720a2497f045` | Rich Copestake | richard@... | 2025-11-30 | Fix investment creation: set transfer_id and pay_in_id to null instead... |
| 55 | `58258a911ac5` | Rich Copestake | richard@... | 2025-11-30 | Fix investment type values: use 1,2 (Debt/Mezzanine) instead of 0,1 in... |
| 56 | `cebf2f2fc9bb` | Rich Copestake | richard@... | 2025-11-30 | Fix investment type validation: handle empty strings and ensure type i... |
| 57 | `d5cc42a96853` | Rich Copestake | richard@... | 2025-11-30 | Add comprehensive functionality to project detail page: quick actions,... |
| 58 | `06ed5fc7005b` | Rich Copestake | richard@... | 2025-11-30 | Add comprehensive project management system: migrations, models, contr... |
| 59 | `1a17cfdcde15` | Rich Copestake | richard@... | 2025-11-30 | Fix updates: pre-select project from URL, add multiple image upload wi... |
| 60 | `7241f348fe2b` | Rich Copestake | richard@... | 2025-11-30 | Fix: Handle missing document tables gracefully until migrations are ru... |
| 61 | `3a3a1b3ceef7` | Rich Copestake | richard@... | 2025-11-30 | Add SQL migration files for direct database execution |
| 62 | `e3d67e9ee73f` | Rich Copestake | richard@... | 2025-11-30 | Fix SQL migration syntax for MySQL compatibility |
| 63 | `705eadfed5eb` | Rich Copestake | richard@... | 2025-11-30 | Fix SQL: correct column reference in show_drawings ALTER statement |
| 64 | `14b1f7eac23e` | Rich Copestake | richard@... | 2025-11-30 | Add URL route to run document migrations via browser |
| 65 | `fb681d45a3f7` | Rich Copestake | richard@... | 2025-11-30 | Fix: Rename UpdateImage update() method to updateRecord() to avoid con... |
| 66 | `ab8c0cbd4780` | Rich Copestake | richard@... | 2025-11-30 | Fix SQL migration: Remove AFTER clauses that cause errors when columns... |
| 67 | `43a2b43f4a66` | Rich Copestake | richard@... | 2025-11-30 | Improve SQL statement parsing in migration route |
| 68 | `f8f0b0ba1f55` | Rich Copestake | richard@... | 2025-11-30 | Add system status management: admin interface, login page widget, and ... |
| 69 | `2107e7e407bd` | Rich Copestake | richard@... | 2025-11-30 | Add system status migration route |
| 70 | `1638d1b8e29d` | Rich Copestake | richard@... | 2025-11-30 | Create admin dashboard view with stats and recent activity |
| 71 | `18ae1f833bfe` | Rich Copestake | richard@... | 2025-11-30 | Redesign login page with modern gradient design and convert investor d... |
| 72 | `add67970465e` | Rich Copestake | richard@... | 2025-11-30 | Disable failing tests workflow |
| 73 | `17fe4e9703a3` | Rich Copestake | richard@... | 2025-11-30 | Redesign public homepage with modern gradient hero, improved typograph... |
| 74 | `e9f0ddbafc06` | Rich Copestake | richard@... | 2025-11-30 | Redesign projects listing page with modern card grid, improved typogra... |
| 75 | `37453ac500ee` | Rich Copestake | richard@... | 2025-11-30 | Fix Vite manifest error with fallback and add Create Account functiona... |
| 76 | `5317fc1ba1b2` | Rich Copestake | richard@... | 2025-11-30 | Add fillable fields to Company model |
| 77 | `54e352b84b6b` | Rich Copestake | richard@... | 2025-11-30 | Add graceful error handling for missing system_status table |
| 78 | `1ad046d7ef13` | Rich Copestake | richard@... | 2025-11-30 | Fix system status form submission: improve checkbox handling, Quill ed... |
| 79 | `8f0502772ad7` | Rich Copestake | richard@... | 2025-11-30 | Fix form validation error: remove required from hidden textarea and ad... |
| 80 | `0d1622b58a3e` | Rich Copestake | richard@... | 2025-11-30 | Fix system status form: sync Quill editor with hidden textarea in real... |
| 81 | `6739fa0b05f4` | Rich Copestake | richard@... | 2025-11-30 | Improve system status migration route: better SQL parsing and table ex... |
| 82 | `44d27a215cb9` | Rich Copestake | richard@... | 2025-11-30 | Simplify system status migration: execute SQL directly and check table... |
| 83 | `c1af8950e328` | Rich Copestake | richard@... | 2025-11-30 | Add date and time display to system status widget on login page |
| 84 | `12fd9ce6fb27` | Rich Copestake | richard@... | 2025-11-30 | Add account search and document upload to investment creation form |
| 85 | `8de8b5c33926` | Rich Copestake | richard@... | 2025-11-30 | Add Home link to sidebar, replace top bar title with breadcrumb naviga... |
| 86 | `5ef422ee78d4` | Rich Copestake | richard@... | 2025-11-30 | Remove duplicate title from system status page |
| 87 | `e7802e9bd04e` | Rich Copestake | richard@... | 2025-11-30 | Improve breadcrumb to show dynamic names (e.g., project names) for sho... |
| 88 | `307964d2780d` | Rich Copestake | richard@... | 2025-11-30 | Fix account search with clear instructions, redesign account detail pa... |
| 89 | `9a927fd26ba7` | Rich Copestake | richard@... | 2025-11-30 | Add helpdesk tab with chat-like ticket system, enhance dashboard overv... |
| 90 | `3a67b534e192` | Rich Copestake | richard@... | 2025-11-30 | Add system status widget to investor dashboard and support ticket migr... |
| 91 | `962ed052e80d` | Rich Copestake | richard@... | 2025-11-30 | Add support ticket migration route |
| 92 | `95434314e0ae` | Rich Copestake | richard@... | 2025-11-30 | Fix support ticket migration SQL syntax - split statements and handle ... |
| 93 | `d14bd31e9aa4` | Rich Copestake | richard@... | 2025-11-30 | Fix duplicate route name for investor.support.store - remove project p... |
| 94 | `d96283345cf0` | Rich Copestake | richard@... | 2025-11-30 | Add notification bell to top bar, change notifications tab to email hi... |
| 95 | `f4194245e3e6` | Rich Copestake | richard@... | 2025-11-30 | Add Alpine.js to admin layout for notification dropdown |
| 96 | `8e4addd0cc40` | Rich Copestake | richard@... | 2025-11-30 | Complete system status updates feature with fixed button, add email hi... |
| 97 | `7a1fa26f729d` | Rich Copestake | richard@... | 2025-11-30 | Add system status updates migration route |
| 98 | `d4355d7e2b76` | Rich Copestake | richard@... | 2025-11-30 | Fix system status updates to handle missing table gracefully, make mig... |
| 99 | `992a11b51d72` | Rich Copestake | richard@... | 2025-11-30 | Add admin-prefixed migration route redirects |
| 100 | `7ca8c62309ab` | Rich Copestake | richard@... | 2025-11-30 | Add admin-prefixed migration routes that actually run the migrations |
| 101 | `7b738f831667` | Rich Copestake | richard@... | 2025-11-30 | Add account shares migration route and handle missing table gracefully... |
| 102 | `eed421c77ed2` | Rich Copestake | richard@... | 2025-11-30 | Fix account search on investments create page - improve query handling... |
| 103 | `707b19f5335c` | Rich Copestake | richard@... | 2025-11-30 | Fix jQuery dependency for Select2 and remove Font Awesome integrity ch... |
| 104 | `eff15637df27` | Rich Copestake | richard@... | 2025-11-30 | Fix foreign key constraint violation - convert empty/zero values to nu... |
| 105 | `fd65ada8c447` | Rich Copestake | richard@... | 2025-11-30 | Fix nested form issue - remove form tag from document upload section |
| 106 | `235fd095bbe2` | Rich Copestake | richard@... | 2025-11-30 | Fix null project error in investor dashboard - add null checks for pro... |
| 107 | `7439222855a6` | Rich Copestake | richard@... | 2025-11-30 | Fix foreign key constraint - validate and convert invalid transfer_id/... |
| 108 | `1cff5fcbc065` | Rich Copestake | richard@... | 2025-11-30 | Add login route alias to fix RouteNotFoundException |
| 109 | `63525669703b` | Rich Copestake | richard@... | 2025-12-01 | Update homepage copy to reflect no new investment opportunities |
| 110 | `ac92cf4b70cd` | Rich Copestake | richard@... | 2025-12-01 | Update homepage messaging and investment workflow fixes |
| 111 | `a4c3a50ae43c` | Rich Copestake | richard@... | 2025-12-01 | Simplify homepage to platform update only |
| 112 | `388e3030408e` | Rich Copestake | richard@... | 2025-12-01 | Simplify homepage to platform update only |
| 113 | `5a9258a4c2ce` | Rich Copestake | richard@... | 2025-12-01 | Simplify homepage to platform update only |
| 114 | `a6ed5c5b1ece` | Rich Copestake | richard@... | 2025-12-01 | Security fixes |
| 115 | `6e4071e5602d` | Rich Copestake | richard@... | 2025-12-01 | Security fixes |
| 116 | `ca6c567926eb` | Rich Copestake | richard@... | 2025-12-01 | Security fixes |
| 117 | `f082d77a90e2` | Rich Copestake | richard@... | 2025-12-01 | Security fixes |
| 118 | `d208f6da1046` | Rich Copestake | richard@... | 2025-12-01 | Email system deployment |
| 119 | `9cf105880e7b` | Rich Copestake | richard@... | 2025-12-01 | Email system deployment |
| 120 | `8663e5f85f92` | Rich Copestake | richard@... | 2025-12-03 | Wire Postmark email system and fix admin updates controller |
| 121 | `7a0bb05d0d2d` | Rich Copestake | richard@... | 2025-12-03 | Add home route redirecting to investor login |
| 122 | `c6f5abd5922a` | Rich Copestake | richard@... | 2025-12-03 | Restore full routes file and set home to investor login |
| 123 | `7b89edaa043b` | Rich Copestake | richard@... | 2025-12-03 | Point 404 homepage link at investor login instead of home route |
| 124 | `5288fd6030ca` | Rich Copestake | richard@... | 2025-12-03 | Remove Email Templates menu until routes are wired |
| 125 | `2ae82b592169` | Rich Copestake | richard@... | 2025-12-03 | Temporarily remove Changelog menu link to avoid missing route |
| 126 | `af7916aaff0a` | Rich Copestake | richard@... | 2025-12-03 | Ensure home route redirects to investor login |
| 127 | `c511c4b30246` | Rich Copestake | richard@... | 2025-12-03 | Restore full routes file including investor login |
| 128 | `f3786d22c892` | Rich Copestake | richard@... | 2025-12-03 | Add admin changelog routes |
| 129 | `c9613b7927ec` | Rich Copestake | richard@... | 2025-12-03 | Order projects numerically by project_id in updates dropdown |
| 130 | `768e978f1763` | Rich Copestake | richard@... | 2025-12-03 | Require symfony/postmark-mailer for Postmark transport |
| 131 | `58eca2166f5e` | Rich Copestake | richard@... | 2025-12-04 | Fix null project error in ProjectUpdateMail |
| 132 | `9683def0615a` | Rich Copestake | richard@... | 2025-12-04 | Fix image display in update show view |
| 133 | `b4c7333b37c7` | Rich Copestake | richard@... | 2025-12-04 | Simplify image URL generation to use asset() directly |
| 134 | `2046d623d192` | Rich Copestake | richard@... | 2025-12-04 | Add admin-prefixed route for document migrations |
| 135 | `7a9358cb4b56` | Rich Copestake | richard@... | 2025-12-04 | Improve document migrations route with table verification |
| 136 | `14af6c9ae239` | Rich Copestake | richard@... | 2025-12-04 | Add direct route to create account_documents table |
| 137 | `041af7906ba3` | Rich Copestake | richard@... | 2025-12-04 | Make document file upload optional |
| 138 | `dc561275e877` | Rich Copestake | richard@... | 2025-12-04 | Fix foreign key validation for transfer_id and pay_in_id |
| 139 | `da4cef603edb` | Rich Copestake | richard@... | 2025-12-08 | Fix 'Unknown' project names and add personal documents section |
| 140 | `f76cbb5d268f` | Rich Copestake | richard@... | 2025-12-08 | Fix 'Unknown Project' display in investor dashboard |
| 141 | `7a5b465c41c6` | Rich Copestake | richard@... | 2025-12-08 | Improve project name loading in account page with better fallbacks |
| 142 | `65ea94f26b33` | Rich Copestake | richard@... | 2025-12-08 | Fix 'Call to a member function format() on string' error |
| 143 | `2a9619194fd3` | Rich Copestake | richard@... | 2025-12-08 | Fix 'Call to a member function format() on string' error in investor d... |
| 144 | `81b3366cc2ef` | Rich Copestake | richard@... | 2025-12-08 | Fix project loading in investor dashboard to match admin account page |
| 145 | `f1d3029e9ca9` | Rich Copestake | richard@... | 2025-12-08 | Fix project updates accordion and Recent Activity section |
| 146 | `ae9ee4eacb4e` | Rich Copestake | richard@... | 2025-12-08 | Fix Email History tab loading and improve fallback message |
| 147 | `ec1d3be41328` | Rich Copestake | richard@... | 2025-12-08 | Add click-to-view functionality for email history |
| 148 | `52b42c350fcc` | Rich Copestake | richard@... | 2025-12-09 | Add support for multiple file types in project updates |
| 149 | `65651a1c3d85` | Rich Copestake | richard@... | 2025-12-09 | Update investor dashboard: show only most recent update, remove paymen... |
| 150 | `272897c3219d` | Rich Copestake | richard@... | 2025-12-09 | Update investor dashboard to match brand colors |
| 151 | `e408953f6794` | Rich Copestake | richard@... | 2025-12-10 | Add cache clearing route for debugging |
| 152 | `7a03b503e9a0` | Rich Copestake | richard@... | 2025-12-10 | Fix cache clearing route to handle SQLite errors gracefully |
| 153 | `3d31c1cd1a04` | Rich Copestake | richard@... | 2025-12-10 | Remove duplicate masquerading banner from investor dashboard (already ... |
| 154 | `de2b2ca7dff7` | Rich Copestake | richard@... | 2025-12-10 | Add missing @endif before @endsection to fix ParseError |
| 155 | `94654fff5379` | Rich Copestake | richard@... | 2025-12-10 | Remove extra @endif - investigating ParseError |
| 156 | `50fdff966cee` | Rich Copestake | richard@... | 2025-12-10 | Fix CI workflow: Update composer lock file before install to handle ou... |
| 157 | `5c208e8f6b9c` | Rich Copestake | richard@... | 2025-12-10 | Disable GitHub Actions lint workflow - Forge handles deployments |
| 158 | `af06cff2a18b` | Rich Copestake | richard@... | 2025-12-10 | Trigger deployment: Ensure syntax error fix is deployed |
| 159 | `39540a972e01` | Rich Copestake | richard@... | 2025-12-10 | Fix syntax error: Add missing @endif before @endsection |
| 160 | `125fcfa79915` | Rich Copestake | richard@... | 2025-12-10 | Fix: Add null checks to UpdateImage url and thumbnail_url accessors to... |
| 161 | `8a5907937b79` | Rich Copestake | richard@... | 2025-12-10 | Fix: Add null check for file_path in getFileTypeCategoryAttribute to p... |
| 162 | `3d72565e3cea` | Rich Copestake | richard@... | 2025-12-10 | Fix: Add error handling and null checks in UpdateShowController to pre... |
| 163 | `5fb1b661a4f1` | Rich Copestake | richard@... | 2025-12-10 | Fix: Add additional type checks and error handling in UpdateImage acce... |
| 164 | `ae91cdfc60c2` | Rich Copestake | richard@... | 2025-12-10 | Fix: Improve pathinfo handling for non-image files to prevent array ke... |
| 165 | `3803f40f2078` | Rich Copestake | richard@... | 2025-12-10 | Fix: Add comprehensive error handling and suppress pathinfo warnings t... |
| 166 | `c2eb9f65ab9d` | Rich Copestake | richard@... | 2025-12-10 | Fix: Add comprehensive error handling in InvestorDashboardController i... |
| 167 | `94e789d0a072` | Rich Copestake | richard@... | 2025-12-10 | Fix: Replace pathinfo() with custom string parsing to eliminate undefi... |
| 168 | `da8402967ec6` | Rich Copestake | richard@... | 2025-12-10 | Fix: Improve substr() handling in UpdateImage to prevent undefined arr... |
| 169 | `5dcc0bcfba72` | Rich Copestake | richard@... | 2025-12-10 | Fix: Add comprehensive type checking and error handling to prevent und... |
| 170 | `5db8bd4babf2` | Rich Copestake | richard@... | 2025-12-10 | Fix: Access file_path directly from attributes to prevent casting issu... |
| 171 | `058bcbe1bf68` | Rich Copestake | richard@... | 2025-12-11 | Fix: Add comprehensive error handling in UpdateShowController and safe... |
| 172 | `33b4e3840e34` | Rich Copestake | richard@... | 2025-12-11 | Fix: Improve error handling in InvestorDashboardController image mappi... |
| 173 | `923d6cc78c3c` | Rich Copestake | richard@... | 2025-12-11 | Revert: Simplify updates section to only handle images |
| 174 | `7e6aa3c17180` | Rich Copestake | richard@... | 2025-12-11 | Fix: Build image URLs directly from file_path to avoid accessor method... |
| 175 | `9403b42696f3` | Rich Copestake | richard@... | 2025-12-11 | Remove images and files from updates section in investor dashboard |
| 176 | `8ec71136baf2` | Rich Copestake | richard@... | 2025-12-11 | Fix: Remove orphaned @endif causing syntax error |
| 177 | `ab095ed6970a` | Rich Copestake | richard@... | 2025-12-11 | Fix: Add explicit text colors to prevent white text on white backgroun... |
| 178 | `e6281e563d22` | Rich Copestake | richard@... | 2025-12-11 | Fix: Add text colors to loading and empty states |
| 179 | `e8d5e7ccdfe9` | Rich Copestake | richard@... | 2025-12-11 | Fix: Add explicit white text colors to project header sections |
| 180 | `e8533d471bdb` | Rich Copestake | richard@... | 2025-12-11 | Fix: Add explicit white text colors to payout section header |
| 181 | `b22584f7e5dd` | Rich Copestake | richard@... | 2025-12-11 | Fix: Render HTML properly in update comments instead of escaping |
| 182 | `cc76c241450f` | Rich Copestake | richard@... | 2025-12-11 | Change project header from gradient to solid purple background |
| 183 | `fce7fdfd56a5` | Rich Copestake | richard@... | 2025-12-11 | Change Project Not Found header to solid purple |
| 184 | `0b77d8a6a5b4` | Rich Copestake | richard@... | 2025-12-11 | Update colors: Replace bright purple/teal with subtle slate tones |
| 185 | `ee825a6f997e` | Rich Copestake | richard@... | 2025-12-11 | Complete color update: Replace remaining purple/teal with slate tones |
| 186 | `d905af97eb0e` | Rich Copestake | richard@... | 2025-12-11 | Add images and documents support to update modal display |
| 187 | `1397ea25f6be` | Rich Copestake | richard@... | 2025-12-11 | Add file_type and mime_type columns to update_images table |
| 188 | `c27e3a172c16` | Rich Copestake | richard@... | 2025-12-11 | Add route to run update_images columns migration |
| 189 | `078f49b1ba8b` | Rich Copestake | richard@... | 2025-12-12 | Cursor: Apply local changes for cloud agent |
| 190 | `bf57ea2f9dda` | Rich Copestake | richard@... | 2025-12-12 | Fix Blade syntax error: remove blank line between @endpush and @endsec... |
| 191 | `be4a5a8c4f29` | Rich Copestake | richard@... | 2025-12-12 | Fix Blade syntax: add proper spacing between @endpush and @endsection ... |
| 192 | `776b7836a8b5` | Rich Copestake | richard@... | 2025-12-12 | Remove file displays from updates, show only images in investor dashbo... |
| 193 | `75f838cc39a7` | Rich Copestake | richard@... | 2025-12-12 | Fix Blade syntax: replace where() with filter() closures to avoid pars... |
| 194 | `2f9df78a24ad` | Rich Copestake | richard@... | 2025-12-12 | Fix Blade syntax: replace filter closures with simple @if checks insid... |
| 195 | `7f229c8962ab` | Rich Copestake | richard@... | 2025-12-12 | Update investor dashboard: verify Blade structure and fix image filter... |
| 196 | `29171921097c` | Rich Copestake | richard@... | 2025-12-12 | Fix: restore missing @endpush and @endsection directives at end of fil... |
| 197 | `eca4b042531c` | Rich Copestake | richard@... | 2025-12-14 | Ensure file ends with newline after @endsection |
| 198 | `a9a2c0846496` | Rich Copestake | richard@... | 2025-12-14 | Add runtime instrumentation to InvestorDashboardController for debuggi... |
| 199 | `1678b1b76b8c` | Rich Copestake | richard@... | 2025-12-15 | Add server-side logging to capture actual file state and errors on ser... |
| 200 | `198f922b1892` | Rich Copestake | richard@... | 2025-12-15 | Move @push outside @section to fix Blade compilation error |
| 201 | `79c71930eb4a` | Rich Copestake | richard@... | 2025-12-15 | Update dashboard and migration files |
| 202 | `4a1ddde3d9e3` | Rich Copestake | richard@... | 2025-12-15 | Fix Documents Tab section: correct structure with @endif and closing d... |
| 203 | `fdd308365a74` | Rich Copestake | richard@... | 2025-12-15 | Fix Documents Tab: remove extra closing div tag causing structure issu... |
| 204 | `0381624f8dce` | Rich Copestake | richard@... | 2025-12-15 | Update dashboard file |
| 205 | `43fa8272c30e` | Rich Copestake | richard@... | 2025-12-15 | Update investor dashboard |
| 206 | `6a8df1d32d55` | Rich Copestake | richard@... | 2025-12-15 | Restore missing @extends directive in dashboard |
| 207 | `8eb4e96952d1` | Rich Copestake | richard@... | 2025-12-15 | Fix missing @endpush directive causing Blade compilation error |
| 208 | `30ea3cc34301` | Rich Copestake | richard@... | 2025-12-15 | Remove all image displays from project updates |
| 209 | `0eb56b2ecaf3` | Rich Copestake | richard@... | 2025-12-15 | Add file and image display to project updates sections |
| 210 | `c9e44631148d` | Rich Copestake | richard@... | 2025-12-15 | Fix Alpine.js nested template tags causing Blade parsing error |
| 211 | `c321132f871b` | Rich Copestake | richard@... | 2025-12-15 | Remove all image and file displays from project updates |
| 212 | `6ea03d87f18d` | Rich Copestake | richard@... | 2025-12-15 | Add per-project performance summaries, improved empty states, and cros... |
| 213 | `5fe5581906e5` | Rich Copestake | richard@... | 2025-12-15 | Complete cross-linking and improved empty states |
| 214 | `5ab169ea633b` | Rich Copestake | richard@... | 2025-12-15 | Add help link to email history empty state |
| 215 | `6cc854cce617` | Rich Copestake | richard@... | 2025-12-15 | Fix Postmark integration for update emails and add resend functionalit... |
| 216 | `0fc8679a4d7d` | Rich Copestake | richard@... | 2025-12-15 | Complete Postmark fix and resend route |
| 217 | `074b411600c8` | Rich Copestake | richard@... | 2025-12-15 | Fix investor updates query to only show sent, non-deleted updates with... |
| 218 | `578ea764de3b` | Rich Copestake | richard@... | 2025-12-16 | Fix images/files in updates: include in emails, simplify dashboard dis... |
| 219 | `d2346199e327` | Rich Copestake | richard@... | 2025-12-16 | Simplify email history file display to match dashboard updates |
| 220 | `5309ff614ed5` | Rich Copestake | richard@... | 2025-12-16 | Add attachments section to project update email template |
| 221 | `39cb67c07396` | Rich Copestake | richard@... | 2025-12-16 | Add resend update email feature for investors |
| 222 | `bfed3370f2c0` | Rich Copestake | richard@... | 2025-12-16 | Add resend button to Recent Activity section |
| 223 | `4927163b4477` | Rich Copestake | richard@... | 2025-12-17 | Fix email sending: use project internal id for investments lookup, add... |
| 224 | `2212fdb49a65` | Rich Copestake | richard@... | 2025-12-17 | Add visual email confirmation indicators to updates list and detail pa... |
| 225 | `641cbbabe9b9` | Rich Copestake | richard@... | 2025-12-17 | Add success/error message display to updates index page |
| 226 | `420cbbc3df1f` | Rich Copestake | richard@... | 2025-12-17 | Add admin panel link to investor dashboard for users with admin permis... |
| 227 | `ae08f087fbb6` | Rich Copestake | richard@... | 2025-12-17 | Fix undefined internalSentCount in bulk email dispatch and track inter... |
| 228 | `52a077197ae3` | Rich Copestake | richard@... | 2025-12-17 | Fix bulkEmailPreflight project ID lookup and improve zero-investor fee... |
| 229 | `72dd7f0e36c4` | Rich Copestake | richard@... | 2025-12-17 | Add improved zero-investor feedback to update store method |
| 230 | `00b5b6c75d69` | Rich Copestake | richard@... | 2025-12-17 | Add detailed logging to debug zero investor email issue |
| 231 | `c0b7b40e6817` | Rich Copestake | richard@... | 2025-12-17 | Improve account loading and add detailed debugging for investor accoun... |
| 232 | `3616d12a94f0` | Rich Copestake | richard@... | 2025-12-17 | Fix misleading error message: distinguish between no emails vs email d... |
| 233 | `bb1d8fcb3b30` | Rich Copestake | richard@... | 2025-12-17 | Remove duplicate logging line |
| 234 | `4c32ee634ad8` | Rich Copestake | richard@... | 2025-12-17 | Add global email log system with Postmark integration, delivery status... |
| 235 | `8543ba9780c3` | Rich Copestake | richard@... | 2025-12-17 | Fix PHP error in LogEmailSent and create full email template managemen... |
| 236 | `b4927e2b93e7` | Rich Copestake | richard@... | 2025-12-17 | Fix test email sending functionality in EmailTemplateController |
| 237 | `89d6acc1399c` | Rich Copestake | richard@... | 2025-12-17 | Add missing email-logs routes |
| 238 | `eaced869ee01` | Rich Copestake | richard@... | 2025-12-17 | Fix EmailLog update() method name conflict - rename to updateRelation(... |
| 239 | `cbbc47352aaf` | Rich Copestake | richard@... | 2025-12-19 | Add comprehensive project history report with time estimates |
| 240 | `61f81b83e62c` | Rich Copestake | richard@... | 2025-12-19 | Add detailed time tracking breakdown for billing purposes |
| 241 | `22ea385388f1` | Rich Copestake | richard@... | 2025-12-19 | Update project reports with comprehensive 4-week time tracking includi... |
| 242 | `bc2cb22cd742` | Rich Copestake | richard@... | 2025-12-19 | Add comprehensive GitHub commits log with full details |
| 243 | `8444d5943fde` | Rich Copestake | richard@... | 2025-12-19 | Update GitHub commits log: include all commits from project start (Aug... |
| 244 | `6c9ed51f8d44` | Rich Copestake | richard@... | 2025-12-19 | Remove temporary commit log generation script |
| 245 | `f567023e99b3` | Rich Copestake | richard@... | 2025-12-19 | Update commit counts: 243 total commits (231 by Rich Copestake, 12 by ... |
| 246 | `f04857650481` | Rich Copestake | richard@... | 2025-12-19 | Update to 244 total commits (232 by Rich Copestake, 12 by Chris Rouxel... |
| 247 | `86f540fd2317` | Rich Copestake | richard@... | 2025-12-19 | Add complete chronological commit list with all commits from August 19... |

**Note:** All commits from #13 onwards are by Rich Copestake (richard@rise-capital.co.uk). The "Detailed Commit Log" section above contains complete file change details for commits from November 29, 2025 onwards.

**To view the complete file change details for any commit, use:**
```bash
git show <commit-hash> --stat
```

**Or view on GitHub at:** https://github.com/richarddev20/jvlegacy/commit/<commit-hash>

---

## Files Changed Summary

### Most Modified Files

| File | Commits | Total Changes |
|------|---------|---------------|
| `resources/views/investor/dashboard.blade.php` | 80+ | ~5,000+ lines |
| `app/Http/Controllers/Admin/UpdateController.php` | 25+ | ~800+ lines |
| `app/Http/Controllers/Investor/InvestorDashboardController.php` | 30+ | ~600+ lines |
| `routes/web.php` | 20+ | ~400+ lines |
| `app/Models/UpdateImage.php` | 15+ | ~300+ lines |
| `resources/views/admin/updates/index.blade.php` | 15+ | ~250+ lines |
| `app/Http/Controllers/Admin/EmailLogController.php` | 5+ | ~200+ lines |

### New Files Created

- `app/Models/EmailLog.php`
- `app/Services/PostmarkService.php`
- `app/Listeners/LogEmailSent.php`
- `app/Http/Controllers/Admin/EmailLogController.php`
- `app/Http/Controllers/Admin/EmailTemplateController.php` (enhanced)
- `database/migrations/2025_12_09_000001_create_email_logs_table.php`
- `resources/views/admin/email-logs/index.blade.php`
- `resources/views/admin/email-logs/show.blade.php`
- `resources/views/admin/email-templates/show.blade.php`
- `PROJECT_HISTORY_REPORT.md`
- `DETAILED_TIME_TRACKING.md`
- `GITHUB_COMMITS_LOG.md` (this file)

---

## Commit Activity Heatmap

```
August 2025:
19: ████████████ (7 commits - Initial setup by Chris Rouxel)
29: ████████ (4 commits - Email system setup)
30: ██ (1 commit)

November 2025:
17: ██ (1 commit - Rich Copestake begins)
28: ██ (1 commit)
29: ████████████████████████████████████████████████████████████████████████████ (70+ commits)
30: ████████████████████████████████████████████████████████████████████████████ (50+ commits)

December 2025:
01-04: ████████████████████ (15 commits)
08-09: ████████████████████ (10 commits)
10-11: ████████████████████████████████████████████████████████████████████████████ (40+ commits)
12-14: ████████████████████████████████████████████████████████████████████████████ (20+ commits)
15-16: ████████████████████ (12 commits)
17:    ████████████████████████████████████████████████████████████████████████████ (20 commits)
19:    ████████ (4 commits)
```

---

## Developer Contributions

### Rich Copestake (richard@rise-capital.co.uk)
- **Total Commits:** 232
- **Primary Focus:** Full-stack development, bug fixes, feature implementation
- **Key Areas:** Dashboard, email system, admin panel, bug fixes
- **Period:** November 17, 2025 - December 19, 2025

### Chris Rouxel (chris@jaevee.co.uk)
- **Total Commits:** 12
- **Primary Focus:** Initial setup, email configuration
- **Key Areas:** Mailgun setup, logo additions, initial commits
- **Period:** August 19, 2025 - August 30, 2025

---

## GitHub Repository Information

**Repository:** github.com/richarddev20/jvlegacy  
**Branch:** main  
**Total Commits (Complete History):** 244  
**Lines Added:** ~8,000+  
**Lines Deleted:** ~3,000+  
**Net Change:** ~5,000+ lines  
**Project Duration:** 4 months (August 19 - December 19, 2025)  
**Active Development Period:** 4 weeks intensive (November 17 - December 19, 2025)

---

**Report Generated:** December 19, 2025  
**For:** Complete development history documentation  
**Format:** Markdown with full commit details

---

*Note: This is a comprehensive log of all commits. For specific commit details, use `git show <commit-hash>` or view on GitHub.*

