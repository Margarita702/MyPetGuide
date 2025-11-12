import re
from collections import defaultdict, Counter

# ClamV username
username = "~mstaykova"

# Path to apache files
access_log = "/var/log/apache2/access_log"
error_log = "/var/log/apache2/error_log"

page_counts = Counter()
ip_counts = Counter()
browser_counts = Counter()
access_timeline = defaultdict(int)  # key: hour string, value: count

error_counts = Counter()
error_by_ip = Counter()
error_timeline = defaultdict(int)

# Detect browser from user agent
def detect_browser(agent):
    agent = agent.lower()
    if "chrome" in agent and "edg" not in agent:
        return "Chrome"
    elif "firefox" in agent:
        return "Firefox"
    elif "safari" in agent and "chrome" not in agent:
        return "Safari"
    elif "edg" in agent:
        return "Edge"
    else:
        return "Other"

# Read access_log.log
try:
    with open(access_log, "r", encoding="utf-8", errors="ignore") as f:
        for line in f:
            # Only consider your website lines
            if username not in line:
                continue

            # Example log line:
            # 127.0.0.1 - - [12/Nov/2025:18:30:10 +0100] "GET /~user/index.html HTTP/1.1" 200 512 "-" "Mozilla/5.0 ..."
            m = re.search(r'(\S+) .* \[(.*?)\] "(?:GET|POST) (.*?) HTTP/.*" \d+ \d+ ".*" "(.*?)"', line)
            if not m:
                continue

            ip, timestamp, page, agent = m.groups()

            # Count pages and IPs
            page_counts[page] += 1
            ip_counts[ip] += 1

            # Browser stats
            browser = detect_browser(agent)
            browser_counts[browser] += 1

            # Timeline by hour
            m_time = re.search(r":(\d{2}):\d{2}:\d{2}", timestamp)
            if m_time:
                hour = m_time.group(1)
                access_timeline[hour] += 1
except FileNotFoundError:
    print("Access log not found. Check path.")

# Read error_log.log
try:
    with open(error_log, "r", encoding="utf-8", errors="ignore") as f:
        for line in f:
            if username not in line:
                continue

            # Example: [Wed Nov 12 18:23:45.123456 2025] [php:error] [pid 1234] [client 127.0.0.1:51234] ...
            m = re.search(r'\[(.*?)\].*\[client (\S+)\].*\[(.*?)\]', line)
            if not m:
                continue

            timestamp, ip, err_type = m.groups()
            err_type = err_type.split(":")[-1].lower()

            # Count errors
            error_counts[err_type] += 1
            error_by_ip[ip] += 1

            # Error timeline (by hour)
            h = re.search(r"(\d{2}):\d{2}:\d{2}", timestamp)
            if h:
                hour = h.group(1)
                error_timeline[hour] += 1
except FileNotFoundError:
    print("Error log not found. Check path.")

# Print results
def show(title, data, top=10):
    print(f"\n=== {title} ===")
    for k, v in sorted(data.items(), key=lambda x: -x[1])[:top]:
        print(f"{k:35} {v}")

print("\nPAGE ACCESS STATISTICS:")
show("Most Visited Pages", page_counts)
show("Top IP Addresses", ip_counts)
show("Browsers Used", browser_counts)
show("Visits per Hour (Timeline)", access_timeline)

print("\nERROR STATISTICS:")
show("Error Types", error_counts)
show("Errors by IP", error_by_ip)
show("Errors per Hour (Timeline)", error_timeline)