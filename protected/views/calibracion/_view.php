 @return the date at which this cache entry was last modified
         */
        public String getLastModified() {
            return lastModified;
        }

        /**
         * Gets the entity tag of this cache entry.
         *
         * @return the entity tag of this cache entry
         */
        public String getETag() {
            return etag;
        }

        /**
         * Gets the MIME type of this cache entry.
         *
         * @return the MIME type of this cache entry
         */
        public String getMimeType() {
            return mimeType;
        }

        /**
         * Gets the value of the HTTP 'Location' header with which this cache
         * entry was received.
         *
         * @return the HTTP 'Location' header for this cache entry
         */
        public String getLocation() {
            return location;
        }

        /**
         * Gets the encoding of this cache entry.
         *
         * @return the encoding of this cache entry
         */
        public String getEncoding() {
            return encoding;
        }

        /**
         * Gets the value of the HTTP 'Content-Disposition' header with which
         * this cache entry was received.
         *
         * @return the HTTP 'Content-Disposition' header for this cache entry
         *
