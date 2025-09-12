
PRAGMA foreign_keys=ON;
CREATE TABLE IF NOT EXISTS guests (
  id TEXT PRIMARY KEY,
  name TEXT NOT NULL,
  code TEXT NOT NULL UNIQUE,
  credits_remaining INTEGER NOT NULL DEFAULT 2,
  created_at TEXT NOT NULL DEFAULT (datetime('now'))
);
CREATE TABLE IF NOT EXISTS donations (
  id TEXT PRIMARY KEY,
  guest_id TEXT NOT NULL,
  category TEXT NOT NULL CHECK(category IN ('SCHOOL','HOSPITAL','TEMPLE')),
  amount INTEGER NOT NULL DEFAULT 1,
  created_at TEXT NOT NULL DEFAULT (datetime('now')),
  UNIQUE(guest_id, category),
  FOREIGN KEY(guest_id) REFERENCES guests(id) ON DELETE CASCADE
);
