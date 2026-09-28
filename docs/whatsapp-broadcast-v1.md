# AWQAF WhatsApp Broadcast V1

## Objective
Official member notifications (starting with AGM) through an approved WhatsApp Business provider.

## Guardrails
- No WhatsApp Web automation or unofficial scraping/bot transport.
- Provider credentials remain server-side environment secrets.
- Only approved/eligible recipients are queued.
- Suppression/opt-out is checked before sending.
- campaign_id + normalized phone is unique to prevent duplicate sends.
- Bulk campaigns require test-send and explicit confirmation before dispatch.
- Delivery webhooks update sent/delivered/read/failed state.
- Audit fields retain campaign creator and timestamps.

## State machine
Campaign: draft -> ready -> queued -> sending -> completed | cancelled
Recipient: queued -> sent -> delivered -> read | failed | suppressed

## Phase 2
Filament campaign resource, CSV/member selection, approved template picker, test-send action, queued jobs, Meta Cloud API adapter, signed webhook handling, dashboard metrics and audit events.
